<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="admin-panel")
     *
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('@Admin/default/panel.html.twig');
    }
}