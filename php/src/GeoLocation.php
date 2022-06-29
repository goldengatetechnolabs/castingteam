<?php

class GeoLocation
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
     * @var
     */
    private $responseResolver;

    /**
     * @param $config
     * @return GeoLocation
     */
    public static function create($config)
    {
        return new static($config);
    }

    /**
     * GeoLocation constructor.
     * @param string[] $config
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->curl = Core_CurlHttpClient::create();
    }

    /**
     * @return mixed
     */
    private function getResponseResolver()
    {
        if (! $this->responseResolver) {
            $this->responseResolver = ResponseResolverFactory::get($this->config['api']);
        }

        return $this->responseResolver;
    }

    /**
     * @param $address
     * @return mixed
     * @throws Exception
     */
    public function getCoordinatesByAddress($address)
    {
        $response = $this->curl->
        setUrl($this->config['host'] 
            . $this->config['geo_location_method'] 
            . $this->config['format'] 
            . '?address=' . urlencode($address))->
        setOptions([CURLOPT_RETURNTRANSFER => true])->
        send();
      
        if (
            $response['http_code'] == '200'
        ) {
            return $this->
                getResponseResolver()->
                resolve($response['message'])->
                getCoordinates();
        } else {
            throw new Exception(sprintf('Error: bad http status: %s', $response['http_code']));
        }
    }
}