<?php

namespace CastingteamBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use CastingteamBundle\Entity;

/**
 * @method findOneById(int $id)
 */
class SiteImageGroup extends EntityRepository
{
    public function findOneByImageAndGroup(Entity\SiteImage $image, Entity\Group $group)
    {
        $queryBuilder = $this->createQueryBuilder('mig');

        $queryBuilder
            ->select('mig')
            ->where('mig.siteImage=:image')
            ->andWhere('mig.group=:group')
            ->setParameter('image', $image)
            ->setParameter('group', $group)
            ->setMaxResults(1)
        ;

        $result = $queryBuilder->getQuery()->getResult();

        return count($result) ? $result[0] : null;
    }
}