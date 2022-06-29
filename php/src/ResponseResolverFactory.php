<?php

class ResponseResolverFactory implements Interface_IFactory
{
    const SALT = 'ResponseResolver_';

    /**
     * @param string $class
     * @return mixed
     * @throws Exception
     */
    public static function get($class)
    {
        $className = static::SALT . $class;

        if (class_exists($className,'true')) {
            return new $className();
        } else {
            throw new Exception('Error: Class not found');
        }
    }
}