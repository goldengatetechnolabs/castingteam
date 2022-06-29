<?php

namespace CastingteamBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * @method findOneById(int $id)
 */
class Template extends EntityRepository
{
    /**
     * @return array
     */
    public function findAllAsArray()
    {
        $queryBuilder = $this->createQueryBuilder('template');

        $queryBuilder
            ->select('template')
            ->orderBy('template.id', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult(Query::HYDRATE_ARRAY);
    }

}