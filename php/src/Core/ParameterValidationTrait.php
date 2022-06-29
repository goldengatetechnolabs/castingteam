<?php

trait Core_ParameterValidationTrait
{
    /**
     * @param array $container
     * @param string $key
     * @param mixed $else
     * @return mixed
     */
    protected function getValueOrElse(array $container, $key, $else)
    {
        if (array_key_exists($key, $container)) {
            return $container[$key];
        }

        return $else;
    }

    /**
     * @param array $container
     * @param $key
     * @return mixed
     * @throws Exception_MissedParameter
     */
    protected function getValueOrThrowException(array $container, $key)
    {
        if (array_key_exists($key, $container)) {
            return $container[$key];
        }

        throw new Exception_MissedParameter(sprintf('Required parameter \'%s\' is missing', $key));
    }
}