<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\SubscriptionType;
use AppBundle\Manager\SubscriptionManager;
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
     * DefaultController constructor.
     *
     * @param SubscriptionManager $subscriptionManager
     */
    public function __construct(SubscriptionManager $subscriptionManager)
    {
        $this->subscriptionManager = $subscriptionManager;
    }

    /**
     * @Route("/", name="homepage")
     * @param Request $request
     *
     * @return Response
     * @throws OptimisticLockException
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(SubscriptionType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->subscriptionManager->save($form->getData());
        }

        return $this->render('@App/default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
