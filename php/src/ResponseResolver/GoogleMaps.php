<?php

class ResponseResolver_GoogleMaps implements Interface_IResponseResolver
{
    /**
     * @var array
     */
    private $response;

    /**
     * @param string $response
     * @return ResponseResolver_GoogleMaps
     */
    public function resolve($response)
    {
        $this->response = json_decode($response,1);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCoordinates()
    {
        if ($this->response) {
            if (
                isset($this->response['results']) &&
                count($this->response['results']) &&
                $this->response['status'] == Enum_GoogleMapsStatus::SUCCESS
            ) {
                return [
                    'error' => false,
                    'coordinates' => $this->response['results']['0']['geometry']['location']
                ];
            } else {
                return [
                    'error' => true,
                    'message' => Enum_GoogleMapsStatus::create($this->response['status'])
                ];
            }
        } else {
            return [
                'error' => true,
                'message' => 'Wrong response'
            ];
        }
    }
}