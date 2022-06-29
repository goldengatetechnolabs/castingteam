<?php

class Sms implements Interface_ISendable
{
    /**
     * @var Core_CurlHttpClient
     */
    private $curl;

    /**
     * @var string[]
     */
    private $config;

    /**
     * @param string[] $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->curl = Core_CurlHttpClient::create();
    }

    /**
     * @param string[] $config
     * @return Sms
     */
    public static function create(array $config)
    {
        return new static($config);
    }

    /**
     * @param string $phone
     * @param string $message
     * @return array $response
     * @throws Exception
     */
    public function send($phone,$message)
    {
        $response = $this->curl->
            setUrl($this->config['url'] . $this->config['send_method'])->
            setOptions([CURLOPT_RETURNTRANSFER => true])->
            setPostFields(
                [
                    'OPERATION' => $this->config['operation'],
                    'USERNAME' => $this->config['user'],
                    'PASSWORD' => $this->config['password'],
                    'SENDER' => $this->config['sender'],
                    'DESTINATION' => $phone,
                    'BODY' => $message,
                    'ROUTE' => $this->config['route'],
                    'ALLOWLONG' => $this->config['allow_long']
                ]
            )->
            send();

        if ($response['http_code'] == '200') {
            if ($response['message'] == Enum_SpryngResponse::SUCCESS) {
                return
                    [
                        'error' => false,
                        'message' => Enum_SpryngResponse::create($response['message'])->getLabel()
                    ];
            } else {
                return
                    [
                        'error' => true,
                        'message' => Enum_SpryngResponse::create($response['message'])->getLabel()
                    ];
            }
        } else {
            return
                [
                    'error' => true,
                    'message' => Enum_SpryngResponse::create(Enum_SpryngResponse::TECHNICAL_ERROR)->getLabel()
                ];
        }
    }
}