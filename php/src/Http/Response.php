<?php

class Http_Response
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var string[]
     */
    private $headers;

    /**
     * @var int
     */
    private $httpStatus;

    /**
     * @var string
     */
    private $version;

    public function __construct($content = '', $httpStatus = Enum_HttpStatusCode::HTTP_OK, $headers = [])
    {
        $this->content = $content;
        $this->httpStatus = $httpStatus;
        $this->headers = $headers;
        $this->version = '1.1';
    }

    public static function create($content = '', $httpStatus = Enum_HttpStatusCode::HTTP_OK, $headers = [])
    {
        return new static($content, $httpStatus, $headers);
    }

    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();
    }

    private function sendHeaders()
    {
        if (!headers_sent()) {
            foreach ($this->headers as $name => $value) {
                    header($name . ': ' . $value, false, $this->httpStatus);
            }

            header(sprintf('HTTP/%s %s %s', $this->version, $this->httpStatus, Enum_HttpStatusCode::create($this->httpStatus)->getLabel()), true, $this->httpStatus);
        }
    }

    private function sendContent()
    {
        echo $this->content;
    }
}