<?php

namespace PPE\CommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{

    public function menuAction(){

        $em=$this->getDoctrine()->getManager();
        $categories = $em->getRepository('PPECommerceBundle:Category')->findAll();
        return $this->render('PPECommerceBundle:Default:Category/ModulesUsed/menu.html.twig', array('categories' => $categories));
    }

}