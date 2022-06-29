<?php

class Mailer_Postmark
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var int
     */
    private $attachment_count = 0;

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var Logger_Error
     */
    private $logger;

    /**
     * @var string
     */
    private $url = 'http://api.postmarkapp.com/email';

    /**
     * Mailer_Postmark constructor.
     * @param string $key
     * @param string $from
     * @param string $reply
     */
    public function __construct($key, $from, $reply = '')
    {
        $this->apiKey = $key;
        $this->data['From'] = $from;
        $this->data['ReplyTo'] = $reply;
        $this->logger = Logger_Error::create();
    }

    /**
     * @return bool
     * @throws Mailer_Exception_Send
     */
    public function send()
    {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-Postmark-Server-Token: ' . $this->apiKey
        ];

        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== Enum_HttpStatusCode::HTTP_OK) {
            $this->logger->warning(sprintf('Problem while email sending: %s', $response), []);
        }

        return true;
    }

    /**
     * @param string $to
     * @return Mailer_Postmark
     */
    public function to($to)
    {
        $this->data['To'] = $to;
        return $this;
    }

    /**
     * @param string $cc
     * @return Mailer_Postmark
     */
    public function cc($cc)
    {
        $this->data["Cc"] = $cc;
        return $this;
    }

    /**
     * @param string $bcc
     * @return Mailer_Postmark
     */
    public function bcc($bcc)
    {
        $this->data["Bcc"] = $bcc;
        return $this;
    }

    /**
     * @param string $subject
     * @return Mailer_Postmark
     */
    public function subject($subject)
    {
        $this->data['Subject'] = $subject;
        return $this;
    }

    /**
     * @param string $html
     * @return Mailer_Postmark
     */
    public function html_message($html)
    {
        $this->data['HtmlBody'] = $html;
        return $this;
    }

    /**
     * @param string $msg
     * @return Mailer_Postmark
     */
    public function plain_message($msg)
    {
        $this->data['TextBody'] = $msg;
        return $this;
    }

    /**
     * @param string $tag
     * @return Mailer_Postmark
     */
    public function tag($tag)
    {
        $this->data['Tag'] = $tag;
        return $this;
    }

    /**
     * @param string $name
     * @param string $content
     * @param string $content_type
     * @return Mailer_Postmark
     */
    public function attachment($name, $content, $content_type)
    {
        $this->data['Attachments'][$this->attachment_count]['Name']	= $name;
        $this->data['Attachments'][$this->attachment_count]['ContentType'] = $content_type;

        if (!base64_decode($content, true)) {
            $this->data['Attachments'][$this->attachment_count]['Content'] = base64_encode($content);
        } else {
            $this->data['Attachments'][$this->attachment_count]['Content'] = $content;
        }

        $this->attachment_count++;

        return $this;
    }
}
