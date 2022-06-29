<?php

namespace CastingteamBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * @method findOneById(int $id)
 */
class Keyword extends EntityRepository
{
    /**
     * @return array
     */
    public function getStatistics()
    {
        $queryBuilder = $this->createQueryBuilder('keywords');

        $queryBuilder
            ->select('keywords.word, count(keywords.word) as totalCount')
            ->groupBy('keywords.word')
            ->orderBy('totalCount', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult(Query::HYDRATE_ARRAY);
    }
}