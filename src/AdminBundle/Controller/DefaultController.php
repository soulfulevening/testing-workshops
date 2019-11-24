<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\Type\SubscriptionType;
use AppBundle\Entity\Subscription;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package AdminBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * Lists all subscription entities.
     *
     * @Route("/", name="subscription_index", methods={"GET"})
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subscriptions = $em->getRepository(Subscription::class)->findAll();

        return $this->render('@Admin/subscription/index.html.twig', array(
            'subscriptions' => $subscriptions,
        ));
    }

    /**
     * Displays a form to edit an existing subscription entity.
     *
     * @Route("/subscription/{id}", name="subscription_edit", methods={"GET", "POST"})
     * @param Request $request
     * @param Subscription $subscription
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, Subscription $subscription)
    {
        $editForm = $this->createForm(SubscriptionType::class, $subscription);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subscription_edit', array('id' => $subscription->getId()));
        }

        return $this->render('@Admin/subscription/edit.html.twig', array(
            'subscription' => $subscription,
            'edit_form' => $editForm->createView(),
        ));
    }
}