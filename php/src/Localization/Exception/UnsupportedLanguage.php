<?php

class Localization_Exception_UnsupportedLanguage extends Core_Exception
{
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct('Language Unsupported', $code, $previous);
    }
}