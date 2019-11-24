<?php

namespace AppBundle\Controller\Ajax\Subscription;

use AppBundle\Entity\Subscription;
use AppBundle\Repository\SubscriptionRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CounterController extends Controller
{
    /**
     * @var SubscriptionRepository
     */
    private $subscriptionRepository;

    /**
     * CounterController constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->subscriptionRepository = $entityManager->getRepository(Subscription::class);
    }

    /**
     * @Route("/ajax/subscription/counter", name="ajax-subscription-counter")
     * @return JsonResponse
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function indexAction()
    {
        return new JsonResponse([
            'count' => $this->subscriptionRepository->getCountOfActive(),
        ]);
    }
}