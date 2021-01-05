<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/projectsList", name="projectsList")
     */
    public function listProject()
    {
        $projects=$this->getDoctrine()->getRepository(Project::class)->findAll();
        return $this->render("project/projectsList.html.twig",array('listProjects'=>$projects));
    }

    /**
     * @Route("/showProject/{id}", name="showProject")
     */
    public function showProject($id){
        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);
        return $this->render("project/showProject.html.twig",array('project'=>$project));
    }

    /**
     * @Route("/addProject", name="addProject")
     */
    public function addProject(Request $request){
        $project = new Project();
        $formProject = $this->createForm(ProjectType::class,$project);
        $formProject->handleRequest($request);
        if($formProject->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
            return $this->redirectToRoute("projectsList");
        }

        return $this->render("project/addProject.html.twig",array('formProject'=>$formProject->createView()));
    }

    /**
     * @Route("/removeProject/{id}", name="removeProject")
     */
    public function deleteProject($id){
        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($project);
        $em->flush();
        return
            $this->redirectToRoute("projectsList");
    }
}
