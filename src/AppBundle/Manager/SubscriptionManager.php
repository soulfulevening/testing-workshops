<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Subscription;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;

class SubscriptionManager
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param Subscription $subscription
     *
     * @return Subscription
     * @throws OptimisticLockException
     */
    public function save(Subscription $subscription): Subscription
    {
        $this->entityManager->persist($subscription);
        $this->entityManager->flush($subscription);

        return $subscription;
    }
}