<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contactPage", name="contactPage")
     */
    public function contact(): Response
    {
        return $this->render('contact/contactPage.html.twig');
    }
}
