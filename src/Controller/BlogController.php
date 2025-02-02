<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blogsList", name="blogsList")
     */
    public function index(): Response
    {
        return $this->render('blog/blogsList.html.twig');
    }
}
