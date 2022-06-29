<?php

namespace CastingteamBundle\Entity\Repository;

use CastingteamBundle\Entity;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\Expr;

/**
 * @method findOneById(int $id)
 */
class SiteImage extends EntityRepository
{
    /**
     * @param Entity\Model $model
     * @return array
     */
    public function findAllByModel(Entity\Model $model)
    {
        $queryBuilder = $this->createQueryBuilder('i');

        $queryBuilder
            ->select('i')
            ->leftJoin('i.model', 'm')
            ->where('m.id=:model')
            ->setParameter('model', $model->getId())
            ->orderBy('i.order', 'ASC')
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @param Entity\Model $model
     * @return array
     */
    public function findAllActiveByModelAsArray(Entity\Model $model)
    {
        $queryBuilder = $this->createQueryBuilder('i');

        $queryBuilder
            ->select('i')
            ->leftJoin('i.model', 'm')
            ->where('m.id=:model')
            ->andWhere('i.online=true')
            ->setParameter('model', $model->getId())
            ->orderBy('i.order', 'ASC')
        ;

        return $queryBuilder->getQuery()->getResult(Query::HYDRATE_ARRAY);
    }

    /**
     * @param Entity\Model $model
     * @param Entity\Group $group
     * @return array
     */
    public function findAllByGroupAndModel(Entity\Model $model, Entity\Group $group)
    {
        $queryBuilder = $this->createQueryBuilder('i');

        $queryBuilder
            ->select('i, sig')
            ->leftJoin('i.model', 'm')
            ->leftJoin('i.siteImageGroups', 'sig', Expr\Join::WITH, 'sig.group = :group')
            ->where('m.id=:model')
            ->setParameter('model', $model->getId())
            ->setParameter('group', $group->getId())
            ->orderBy('sig.position', 'ASC')
        ;

        return $queryBuilder->getQuery()->getResult(Query::HYDRATE_ARRAY);
    }

    /**
     * @param Entity\Model $model
     * @param Entity\Group $group
     * @return array
     */
    public function findAllActiveByGroupAndModelAsArray(Entity\Model $model, Entity\Group $group)
    {
        $queryBuilder = $this->createQueryBuilder('i');

        $queryBuilder
            ->select('i, sig')
            ->leftJoin('i.model', 'm')
            ->leftJoin('i.siteImageGroups', 'sig', Expr\Join::WITH, 'sig.group = :group')
            ->where('m.id=:model')
            ->andWhere('sig.online=true')
            ->setParameter('model', $model->getId())
            ->setParameter('group', $group->getId())
            ->orderBy('sig.position', 'ASC')
        ;

        return $queryBuilder->getQuery()->getResult(Query::HYDRATE_ARRAY);
    }
}