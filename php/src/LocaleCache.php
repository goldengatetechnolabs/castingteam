<?php

class LocaleCache
{
    /**
     * @var string[]
     */
    private $config;

    /**
     * LocaleCache constructor.
     * @param string[] $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;

        if (! is_dir($this->config['location'])) {
            mkdir($this->config['location'], 0777);
            chmod($this->config['location'], 0777);
        }
    }

    /**
     * @param $config
     * @return static
     */
    public static function create($config)
    {
        return new static($config);
    }

    /**
     * @param string $key
     * @param string $value
     * @param string $namespace
     * @return bool|int
     */
    public function add($key, $value, $namespace = '')
    {
        if (
            $namespace != '' &&
            is_dir($this->config['location']) &&
            ! is_dir($this->config['location'] . '/' . $namespace)
        ) {
            mkdir($this->config['location'] . '/' . $namespace, 0777);
            chmod($this->config['location'] . '/' . $namespace, 0777);
        }

        if (
            ! file_exists($this->config['location'] . '/' . $namespace . '/' . $key) ||
            filemtime($this->config['location'] . '/' . $namespace . '/' . $key) < strftime('- ' . $this->config['lifetime'])
        ) {
            $result = file_put_contents($this->config['location'] . '/' . $namespace . '/' . $key, $value);

            return $result;
        } else {
            return false;
        }
    }

    /**
     * @param string $key
     * @param string $namespace
     * @return bool|string
     */
    public function get($key, $namespace = '')
    {
        if (file_exists($this->config['location'] . '/' . $namespace . '/' . $key)) {
            return file_get_contents($this->config['location'] . '/' . $namespace . '/' . $key);
        } else {
            return false;
        }
    }

    /**
     * @param string $key
     * @param string $namespace
     * @return int
     */
    public function update($key, $value, $namespace = '')
    {
        if (
            $namespace != '' &&
            is_dir($this->config['location']) &&
            ! is_dir($this->config['location'] . '/' . $namespace)
        ) {
            mkdir($this->config['location'] . '/' . $namespace, 0777);
            chmod($this->config['location'] . '/' . $namespace, 0777);
        }

        $result = file_put_contents($this->config['location'] . '/' . $namespace . '/' . $key, $value);

        return $result;

    }
}