<?php

namespace CastingteamBundle\Entity\Repository;

interface FactoryInterface
{
    /**
     * @return Template
     */
    public function template();

    /**
     * @return Model
     */
    public function model();

    /**
     * @return Selection
     */
    public function selection();

    /**
     * @return FromEmail
     */
    public function fromEmail();

    /**
     * @return Keyword
     */
    public function keyword();

    /**
     * @return Group
     */
    public function group();

    /**
     * @return SiteImage
     */
    public function siteImage();

    /**
     * @return SiteImageGroup
     */
    public function siteImageGroup();

    /**
     * @return Category
     */
    public function category();
}