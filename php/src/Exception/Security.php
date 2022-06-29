<?php

class Exception_Security extends Core_Exception
{
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct('You haven\'t rights for this operation', $code, $previous);
    }
}