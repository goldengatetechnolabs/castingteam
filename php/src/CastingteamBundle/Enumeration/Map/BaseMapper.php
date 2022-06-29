<?php

namespace CastingteamBundle\Enumeration\Map;

abstract class BaseMapper
{
    const DEFAULT_VALUE = 'default';

    /**
     * @var mixed[]
     */
    protected $map;

    /**
     * @param string $value
     * @return mixed
     */
    public function resolve($value)
    {
        return
            array_key_exists($value, $this->map)
                ? $this->map[$value]
                : $this->map[self::DEFAULT_VALUE]
            ;
    }
}