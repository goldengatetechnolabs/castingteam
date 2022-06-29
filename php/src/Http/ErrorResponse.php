<?php

class Http_ErrorResponse
{
    /**
     * Http_ErrorResponse constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param $errorMessage
     * @return Http_Response
     */
    public static function create($errorMessage)
    {
        return new Http_Response($errorMessage, Enum_HttpStatusCode::HTTP_INTERNAL_SERVER_ERROR);
    }
}