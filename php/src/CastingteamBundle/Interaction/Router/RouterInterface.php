<?php

namespace CastingteamBundle\Interaction\Router;

interface RouterInterface
{
    /**
     * @param string $path
     * @return string[]
     */
    public function getRoute($path);
}