<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categoriesList", name="categoriesList")
     */
    public function index(): Response
    {
        $categories=$this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('category/listCategories.html.twig',array('categoriesList'=>$categories));
    }
    /**
     * @Route("/addCategory", name="addCategory")
     */
    public function addCategory(Request $request){
        $category = new Category();
        $formCategory = $this->createForm(CategoryType::class,$category);
        $formCategory->handleRequest($request);
        if($formCategory->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute("categoriesList");
        }

        return $this->render("category/addCategory.html.twig",array('formCategory'=>$formCategory->createView()));
    }
}
