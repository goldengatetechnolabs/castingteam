<?php

class Exception_DataNotFound extends Core_Exception
{
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct('Data can not be found', $code, $previous);
    }
}