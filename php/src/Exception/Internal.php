<?php

class Exception_Internal extends Core_Exception
{
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct('Internal error', $code, $previous);
    }
}