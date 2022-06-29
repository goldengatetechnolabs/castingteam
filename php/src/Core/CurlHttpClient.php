<?php



/**
 * Class Core_CurlHttpClient
 */
class Core_CurlHttpClient
{
    const RESPONSE_MESSAGE   = 'message';
    const RESPONSE_HTTP_CODE = 'http_code';
    const CUSTOMREQUEST_GET  = 'GET';
    const CUSTOMREQUEST_POST = 'POST';
    const CUSTOMREQUEST_PUT  = 'PUT';


    protected $options = [];

    protected $response;

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return Core_CurlHttpClient
     */
    public function setOptions(array $options)
    {
        $this->options = $this->options + $options;
        return $this;
    }
    
    /**
     * @param array $options
     * @return Core_CurlHttpClient
     */
    public static function create(array $options = [])
    {
        return new static($options);
    }

    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->setOptions($options);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function send()
    {
        $handle = curl_init();

        curl_setopt_array($handle, $this->getOptions());

        $this->response[self::RESPONSE_MESSAGE] = curl_exec($handle);

        $this->response[self::RESPONSE_HTTP_CODE] = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if ($this->response['message'] === false) {
            $errorMessage = curl_error($handle)
                ." Info: [message:false], [http_code:{$this->response['http_code']}]";
            $errorCode = (int) curl_errno($handle);
            throw new Exception($errorMessage, $errorCode);
        }

        curl_close($handle);

        return $this->response;
    }

    /**
     * @param $url
     * @return Core_CurlHttpClient
     */
    public function setUrl($url)
    {
        $this->setOptions([CURLOPT_URL => $url]);
        return $this;
    }

    /**
     * @param array $headers
     * @return Core_CurlHttpClient
     */
    public function setHttpHeader(array $headers)
    {
        $this->setOptions([CURLOPT_HTTPHEADER => $headers]);
        return $this;
    }

    /**
     * @param array $post
     * @return Core_CurlHttpClient
     */
    public function setPostFields(array $post)
    {
        $this->setOptions([
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => http_build_query($post)
        ]);
        return $this;
    }

    /**
     * @param string $url
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function get($url,array $params = [])
    {
        if($params) {
            $url = $url . '?' . http_build_query($params, '', '&');
        }

        $options = [
            CURLOPT_URL            => $url,
            CURLOPT_CUSTOMREQUEST  => self::CUSTOMREQUEST_GET,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false
        ];

        $this->setOptions($options);

        return $this->send();
    }

    /**
     * @param string $url
     * @param array $fields
     * @return array
     * @throws Exception
     */
    public function post($url, array $fields)
    {
        $postFieldString = http_build_query($fields, '', '&');

        $options = [
            CURLOPT_URL            => $url,
            CURLOPT_CUSTOMREQUEST  => self::CUSTOMREQUEST_POST,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS     => $postFieldString,
            CURLOPT_POST           => true
        ];

        $this->setOptions($options);

        return $this->send();
    }

    /**
     * @param string $url
     * @param array $fields
     * @return array
     * @throws Exception
     */
    public function put($url, array $fields)
    {
        $postFieldString = http_build_query($fields, '', '&');

        $options = [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST  => self::CUSTOMREQUEST_PUT,
            CURLOPT_POSTFIELDS     => $postFieldString
        ];

        $this->setOptions($options);

        return $this->send();
    }

    /**
     * @param string $url
     * @param string $path
     * @return array
     * @throws Exception
     */
    public function file($url, $path)
    {
        if(!is_file($path)){
            throw new Exception("Strange  file [ {$path} ] given");
        }

        $options = [
            CURLOPT_URL            => $url,
            CURLOPT_UPLOAD         => true,
            CURLOPT_INFILE         => fopen($path, 'rb'),
            CURLOPT_INFILESIZE     => filesize($path),
            CURLOPT_BINARYTRANSFER => true
        ];

        $this->setOptions($options);

        return $this->send();
    }

    /**
     * @param $user
     * @param $password
     * @return Core_CurlHttpClient
     */
    public function setAuth($user, $password)
    {
        $options = [
            CURLOPT_USERPWD => "{$user}:{$password}"
        ];

        $this->setOptions($options);

        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->response[self::RESPONSE_MESSAGE];
    }

    /**
     * @return int
     */
    public function getHttpCode()
    {
        return $this->response[self::RESPONSE_HTTP_CODE];
    }

}