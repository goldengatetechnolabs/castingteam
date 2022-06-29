<?php

namespace CastingteamBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * @method findOneById(int $id)
 * @method findOneByName(string $name)
 */
class Category extends EntityRepository
{
}