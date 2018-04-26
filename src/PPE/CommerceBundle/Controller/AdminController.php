<?php

namespace PPE\CommerceBundle\Controller;

use PPE\CommerceBundle\Entity\Product;
use PPE\CommerceBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller
{
    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function adminAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Produit bien enregistrée.');

            return $this->redirectToRoute('ppe_commerce_admin', array('id' => $product->getId()));
        }

        return $this->render('PPECommerceBundle:Administration:Product/admin.html.twig', array(
            'form' => $form->createView()));
    }
}