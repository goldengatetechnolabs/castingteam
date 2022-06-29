<?php

class Core_Enum
{
    /**
     * @var mixed
     */
    private $value;
    
    /**
     * @var array
     */
    protected static $list = [];

    /**
     * @var array
     */
    protected static $labels = [];

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        if (array_search($value, static::getList(), false)) {
            $this->value = $value;
        }
    }

    /**
     * @param mixed $value
     * @return static
     */
    public static function create($value)
    {
        return new static($value);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return array_search($this->value, static::getList(), false);
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return isset(static::$labels[$this->getValue()])
            ? static::$labels[$this->getValue()]
            : $this->getId();
    }

    /**
     * @return mixed[]
     */
    public static function getList()
    {
        if (! isset(Core_Enum::$list[get_called_class()])) {
            Core_Enum::$list[get_called_class()] = (new ReflectionClass(get_called_class()))->
            getConstants();
        }

        return Core_Enum::$list[get_called_class()];
    }
}