<?php

class Http_JsonResponse extends Http_Response
{
    /**
     * {@inheritdoc}
     */
    public function __construct($content = '', $httpStatus = Enum_HttpStatusCode::HTTP_OK, array $headers = [])
    {
        parent::__construct(json_encode($content), $httpStatus, $headers);
    }
}