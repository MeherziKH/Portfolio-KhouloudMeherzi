<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/HomePage", name="HomePage")
     */
    public function home(): Response
    {
        return $this->render('default/homePage.html.twig');
    }

    /**
     * @Route("/ResumePage", name="ResumePage")
     */
    public function resume(): Response
    {
        return $this->render('default/resumePage.html.twig');
    }

    /**
     * @Route("/ServicesPage", name="ServicesPage")
     */
    public function services(): Response
    {
        return $this->render('default/servicesPage.html.twig');
    }
}
