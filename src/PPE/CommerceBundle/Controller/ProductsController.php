<?php

namespace PPE\CommerceBundle\Controller;

use PPE\CommerceBundle\Form\RechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PPE\CommerceBundle\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductsController extends Controller
{

    /**
     * @param $category
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function categoryAction($category, Request $request){

        $session =$request->getSession();
        $em=$this->getDoctrine()->getManager();
        $findProducts= $em->getRepository("PPECommerceBundle:Product")->byCategory($category);

        $category= $em->getRepository("PPECommerceBundle:Category")->find($category);

        if (!$category) throw new NotFoundHttpException('Désolé ... La page n\'éxiste pas');

        $products = $this->get('knp_paginator')->paginate($findProducts, $request->query->getInt('page', 1),6);

        return $this->render('PPECommerceBundle:Default:Products/Layout/products.html.twig', array('products' => $products, 'panier' => $session->get('panier')));
    }

    public function productsAction(Request $request)
    {
        $session =$request->getSession();
        $em=$this->getDoctrine()->getManager();

        $findProducts= $em->getRepository("PPECommerceBundle:Product")->findAll();

        $products = $this->get('knp_paginator')->paginate($findProducts, $request->query->getInt('page', 1),6);

        return $this->render('PPECommerceBundle:Default:Products/Layout/products.html.twig', array('products' => $products, 'panier' => $session->get('panier')));
    }


    public function presentationAction($id, Request $request)
    {
        $session=$request->getSession();
        $em=$this->getDoctrine()->getManager();
        $product= $em->getRepository('PPECommerceBundle:Product')->find($id);

        if (!$product) throw new NotFoundHttpException('Désolé ... La page n\'éxiste pas');


        return $this->render('PPECommerceBundle:Default:Products/Layout/presentation.html.twig', array('product' => $product, 'panier' => $session->get('panier')));
    }

    public function searchTraitementAction(Request $request)
    {
        $session =$request->getSession();
        $form = $this->createForm(RechercheType::class);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));
            $em = $this->getDoctrine()->getManager();
            $findProducts = $em->getRepository('PPECommerceBundle:Product')->bySearch($form['recherche']->getData());
            $products = $this->get('knp_paginator')->paginate($findProducts, $request->query->getInt('page', 1),6);
        }
        else{
            throw new NotFoundHttpException('Désolé ... Le produit n\'éxiste pas');
        }
        return $this->render('PPECommerceBundle:Default:Products/Layout/products.html.twig', array('products' => $products, 'panier' => $session->get('panier')));

    }
    public function searchAction()
    {
        $form= $this->createForm(RechercheType::class);
        return $this->render('PPECommerceBundle:Default:Recherche/ModulesUsed/recherche.html.twig', array('form' => $form->createView()));
    }
}

