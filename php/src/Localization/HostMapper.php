<?php

class Localization_HostMapper implements Core_MapperInterface
{
    /**
     * @var string[]
     */
    private $map = [
        'castingteam.nl' => 'nederland',
        'castingteam.be' => 'belgie',
        'castingteam.fr' => 'belgie',
        //'castingteam.local' => 'belgie',
    ];

    /**
     * {@inheritdoc}
     */
    public function map($key)
    {
        return array_key_exists($key, $this->map) ? $this->map[$key] : false;
    }
}