<?php

namespace CastingteamBundle\Entity\Repository;

use CastingteamBundle\Entity;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * @method findOneById(int $id)
 * @method findOneByShortName(string $shortName)
 */
class Group extends EntityRepository
{
    /**
     * @param Entity\Category $category
     * @param Entity\Model $model
     * @return array
     */
    public function findAllByModelAndCategory(Entity\Category $category, Entity\Model $model)
    {
        $queryBuilder = $this->createQueryBuilder('g');

        $queryBuilder
            ->select('g')
            ->leftJoin('g.categories', 'c')
            ->leftJoin('g.models', 'm')
            ->where('c.id=:category')
            ->andWhere('m.id=:model')
            ->andWhere('g.name LIKE :groupName OR g.name LIKE :groupNameTwo')
            ->setParameter('category', $category->getId())
            ->setParameter('model', $model->getId())
            ->setParameter('groupName', '%Border %')
            ->setParameter('groupNameTwo', '%Specialties %')
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @return Entity\Group[]
     */
    public function findAllBorderfield()
    {
        $queryBuilder = $this->createQueryBuilder('g');

        $queryBuilder
            ->select('g')
            ->where('g.name LIKE :groupName')
            ->setParameter('groupName', '%Border %')
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @return Entity\Group[]
     */
    public function findAllBorderfieldSpecialties()
    {
        $queryBuilder = $this->createQueryBuilder('g');

        $queryBuilder
            ->select('g')
            ->where('g.name LIKE :groupName')
            ->setParameter('groupName', '%Specialties %')
        ;

        return $queryBuilder->getQuery()->getResult();
    }
}