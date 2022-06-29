<?php

class Router_Resolver
{
    /**
     * @var string[]
     */
    private $config;

    /**
     * @param string[] $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param array $route
     */
    public function resolve(array $route)
    {

    }
}
