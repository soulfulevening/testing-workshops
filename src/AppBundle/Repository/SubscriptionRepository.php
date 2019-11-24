<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

class SubscriptionRepository extends EntityRepository
{
    /**
     * @return int
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function getCountOfActive(): int
    {
        return $this->createQueryBuilder('s')
            ->select('COUNT(s.id)')
            ->where('s.isActive = true')
            ->getQuery()
            ->useQueryCache(true)
            ->getSingleScalarResult();
    }
}