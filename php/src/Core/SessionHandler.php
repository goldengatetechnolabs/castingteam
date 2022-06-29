<?php

class Core_SessionHandler
{
    use Core_ParameterValidationTrait;

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->getValueOrElse($_SESSION, $key, false);
    }

    /**
     * @param string $key
     * @return void
     */
    public function remove($key)
    {
        unset($_SESSION[$key]);
    }
}