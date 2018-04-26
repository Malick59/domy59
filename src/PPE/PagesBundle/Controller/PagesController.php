<?php

namespace PPE\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PagesController extends Controller
{

    public function menuAction(){

        $em=$this->getDoctrine()->getManager();
        $pages = $em->getRepository('PPEPagesBundle:Pages')->findAll();
        return $this->render('PPEPagesBundle:Default:Pages/ModulesUsed/menu.html.twig', array('pages' => $pages));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function pageAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $page= $em->getRepository('PPEPagesBundle:Pages')->find($id);

        if (!$page) throw $this->createNotFoundException('La page n\'éxiste pas');

        return $this->render('PPEPagesBundle:Default:Pages/Layout/pages.html.twig', array('page' => $page));

    }

}
