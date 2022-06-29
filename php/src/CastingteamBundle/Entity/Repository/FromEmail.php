<?php

namespace CastingteamBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * @method findOneById(int $id)
 * @method findOneByAddress(int $address)
 */
class FromEmail extends EntityRepository
{
    /**
     * @return array
     */
    public function findAllAsArray()
    {
        $queryBuilder = $this->createQueryBuilder('from_email');

        $queryBuilder
            ->select('from_email')
            ->orderBy('from_email.id', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult(Query::HYDRATE_ARRAY);
    }
}