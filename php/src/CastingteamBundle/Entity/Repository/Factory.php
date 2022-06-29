<?php

namespace CastingteamBundle\Entity\Repository;

use CastingteamBundle\Entity;
use Doctrine\ORM\EntityManagerInterface;

final class Factory implements FactoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return Template
     */
    public function template()
    {
        return $this->entityManager->getRepository(Entity\Template::class);
    }

    /**
     * @return Model
     */
    public function model()
    {
        return $this->entityManager->getRepository(Entity\Model::class);
    }

    /**
     * @return Selection
     */
    public function selection()
    {
        return $this->entityManager->getRepository(Entity\Selection::class);
    }

    /**
     * @return FromEmail
     */
    public function fromEmail()
    {
        return $this->entityManager->getRepository(Entity\FromEmail::class);
    }

    /**
     * @return Keyword
     */
    public function keyword()
    {
        return $this->entityManager->getRepository(Entity\Keyword::class);
    }

    /**
     * @return SiteImageGroup
     */
    public function siteImageGroup()
    {
        return $this->entityManager->getRepository(Entity\SiteImageGroup::class);
    }

    /**
     * @return Group
     */
    public function group()
    {
        return $this->entityManager->getRepository(Entity\Group::class);
    }

    /**
     * @return SiteImage
     */
    public function siteImage()
    {
        return $this->entityManager->getRepository(Entity\SiteImage::class);
    }

    /**
     * @return Category
     */
    public function category()
    {
        return $this->entityManager->getRepository(Entity\Category::class);
    }
}