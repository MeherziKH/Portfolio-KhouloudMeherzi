<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/projectsList", name="projectsList")
     */
    public function index(): Response
    {
        return $this->render('project/projectsList.html.twig');
    }
}
