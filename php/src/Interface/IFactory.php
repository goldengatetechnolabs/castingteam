<?php

interface Interface_IFactory
{
    /**
     * @param string $class
     * @return mixed
     */
    public static function get($class);
}