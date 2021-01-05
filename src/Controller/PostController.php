<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/postsList", name="postsList")
     */
    public function index(): Response
    {
        $posts=$this->getDoctrine()->getRepository(Post::class)->findAll();
        return $this->render('post/postsList.html.twig',array('postsList'=>$posts));
    }
    /**
     * @Route("/addPost", name="addPost")
     */
    public function addPost(Request $request){
        $post = new Post();
        $formPost = $this->createForm(PostType::class,$post);
        $formPost->handleRequest($request);
        if($formPost->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute("postsList");
        }

        return $this->render("post/addPost.html.twig",array('formPost'=>$formPost->createView()));
    }
}
