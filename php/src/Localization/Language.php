<?php

abstract class Localization_Language
{
    /**
     * @var string[]
     */
    protected $content = [];

    /**
     * @return string[]
     */
    public function getContent()
    {
        return $this->content;
    }
}