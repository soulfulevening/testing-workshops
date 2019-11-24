<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Subscription;
use AppBundle\Form\Type\SubscriptionType;
use AppBundle\Manager\SubscriptionManager;
use AppBundle\Repository\SubscriptionRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{

    /**
     * @var SubscriptionManager
     */
    private $subscriptionManager;

    /**
     * @var SubscriptionRepository
     */
    private $subscriptionRepository;

    /**
     * DefaultController constructor.
     *
     * @param SubscriptionManager $subscriptionManager
     * @param EntityManager $entityManager
     */
    public function __construct(SubscriptionManager $subscriptionManager, EntityManager $entityManager)
    {
        $this->subscriptionManager = $subscriptionManager;
        $this->subscriptionRepository = $entityManager->getRepository(Subscription::class);
    }

    /**
     * @Route("/", name="homepage")
     * @param Request $request
     *
     * @return Response
     * @throws OptimisticLockException
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(SubscriptionType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $subscription = $this->subscriptionManager->save($form->getData());

            return $this->render('@App/default/congratulations.twig', [
                'subscription' => $subscription,
            ]);
        }

        return $this->render('@App/default/index.html.twig', [
            'form' => $form->createView(),
            'counter' => $this->subscriptionRepository->getCountOfActive(),
        ]);
    }
}
