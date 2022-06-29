<?php

namespace CastingteamBundle\Interaction\Router;

final class Router implements RouterInterface
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
     * {@inheritdoc}
     */
    public function getRoute($path)
    {
        $matched = [];

        foreach ($this->config as $key => $value) {
            if (preg_match('/' . $key . '/', $path, $matches)) {
                $matched = $value;

                if (count($matches) > 1) {
                    array_shift($matches);

                    $matched['url_params'] = $matches;
                }
            }
        }

        return $matched;
    }
}