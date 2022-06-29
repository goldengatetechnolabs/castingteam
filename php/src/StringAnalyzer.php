<?php

abstract class StringAnalyzer
{
    /**
     * @var string[]
     */
    protected $map;

    /**
     * @var array
     */
    protected $matches = [];

    /**
     * StringAnalyzer constructor.
     * @param string[] $map
     */
    public function __construct(array $map)
    {
        $this->map = $map;
    }

    /**
     * @param string[] $map
     * @return StringAnalyzer
     */
    public static function create(array $map)
    {
        return new static($map);
    }

    /**
     * @param string $string
     * @return array
     */
    abstract public function analyze($string);
}