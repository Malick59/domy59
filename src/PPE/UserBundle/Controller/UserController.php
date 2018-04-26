<?php

namespace PPE\UserBundle\Controller;

use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function facturesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $factures = $em->getRepository('PPECommerceBundle:Commande')->byFacture($this->getUser());

        return $this->render('PPEUserBundle:Default:Layout/facture.html.twig', array('factures' => $factures));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function facturesPDFAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $facture = $em->getRepository('PPECommerceBundle:Commande')->findOneBy(array('user' => $this->getUser(),
            'valider' => 1,
            'id' => $id));

        if (!$facture) {
            $this->get('session')->getFlashBag()->add('error', 'Une erreur est survenue');
            return $this->redirect($this->generateUrl('factures'));
        }

        $html = $this->renderView('PPEUserBundle:Default:Layout/facturePDF.html.twig', array('facture' => $facture));

        return new PDFResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            'file.pdf'
        );
    }
}
