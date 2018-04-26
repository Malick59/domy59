<?php

namespace PPE\CommerceBundle\Controller;

use PPE\UserBundle\Entity\Address;
use PPE\UserBundle\Form\AddressType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use PPE\CommerceBundle\Entity\Commande;
use Symfony\Component\HttpFoundation\Response;

class PanierController extends Controller
{

    public function miniPanierAction(Request $request) {

        $session= $request->getSession();

        if(!$session->has('panier')) $articles = 0; else $articles=count($session->get('panier'));

        return $this->render('PPECommerceBundle:Default:Panier/ModulesUsed/miniPanier.html.twig', array('articles' => $articles));

    }

    public function supprimerAddressAction($id){
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('PPEUserBundle:Address')->find($id);

     if($this->container->get('security.token_storage')->getToken()->getUser() != $entity->getUser() || !$entity)
         return $this->redirect($this->generateUrl('ppe_commerce_livraison'));

     $em->remove($entity);
     $em->flush();

     return $this->redirect($this->generateUrl('ppe_commerce_livraison'));
    }

    public function panierAction(Request $request)
    {
        $session =$request->getSession();

        if (!$session->has('panier')) $session->set('panier', array());

        $em=$this->getDoctrine()->getManager();
        $products=$em->getRepository('PPECommerceBundle:Product')->findArray(array_keys($session->get('panier')));

        return $this->render('PPECommerceBundle:Default:Panier/Layout/panier.html.twig', array('products'=> $products, 'panier'=>$session->get('panier')));
    }

    public function livraisonAction(Request $request)
    {
       $user= $this->container->get('security.token_storage')->getToken()->getUser();
       $entity = new Address();
       $form = $this->createForm(AddressType::class, $entity);

       if ($request->getMethod() == 'POST')
       {
           $form->handleRequest($request);
           if ($form->isValid()) {
               $em = $this->getDoctrine()->getManager();
               $entity->setUser($user);
               $em->persist($entity);
               $em->flush();

               return $this->redirect($this->generateUrl('ppe_commerce_livraison'));
           }
       }
       return $this->render('PPECommerceBundle:Default:Panier/Layout/livraison.html.twig', array('user' => $user, 'form' => $form->createView()));
    }


    public function setLivraisonOnSession(Request $request)
    {
        $session = $request->getSession();

        if(!$session->has('address')) $session->set('address',array());
        $address=$session->get('address');

        if($request->request->get('livraison') != null && $request->request->get('facturation') != null)
        {
            $address['livraison'] = $request->request->get('livraison');
            $address['facturation'] = $request->request->get('facturation');
        } else {
            return $this->redirect($this->generateUrl('ppe_commerce_validation'));
        }
        $session->set('address', $address);
        return $this->redirect($this->generateUrl('ppe_commerce_validation'));
    }

    public function validationAction(Request $request)
    {
        if($request->getMethod() == 'POST')
            $this->setLivraisonOnSession($request);

        $em = $this->getDoctrine()->getManager();

        $prepareCommande= $this->prepareCommandeAction($request);
        $commande = $em->getRepository('PPECommerceBundle:Commande')->find($prepareCommande->getContent());

        return $this->render('PPECommerceBundle:Default:Panier/Layout/validation.html.twig', array('commande' => $commande));
    }

    public function supprimerAction(Request $request, $id){

        $session =$request->getSession();

        $panier = $session->get('panier');

        if (array_key_exists($id, $panier)) {

            unset($panier[$id]);
            $session->set('panier', $panier);

            $session->getFlashbag()->add('success','Article supprimé avec succés');
        }

        return $this->redirect($this->generateUrl('ppe_commerce_panier'));

    }
    public function ajoutAction(Request $request, $id)
    {
        $session =$request->getSession();

        if (!$session->has('panier')) $session->set('panier', array());

        $panier = $session->get('panier');

        if (array_key_exists($id, $panier)) {
            if ($request->get('qte') != 0) {
                $panier[$id] = $request->get('qte');
                $session->getFlashbag()->add('success', 'Quantité modifié avec succés');
            }
        } else {
            if ($request->get('qte') != 0) {
                $panier[$id] = $request->get('qte');
            } else {
                $panier[$id] = 1;
            }
            $session->getFlashbag()->add('success','Article ajouté avec succés');
        }
        $session->set('panier', $panier);

        return $this->redirect($this->generateUrl('ppe_commerce_panier'));

    }
    public function facture(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $generator = random_bytes(20);
        $session = $request->getSession();

        $address = $session->get('address');
        $panier = $session->get('panier');
        $commande = array();
        $totalHT = 0;
        $totalTTC =0;

        $facturation = $em->getRepository('PPEUserBundle:Address')->find($address['facturation']);
        $livraison = $em->getRepository('PPEUserBundle:Address')->find($address['livraison']);
        $products = $em->getRepository('PPECommerceBundle:Product')->findArray(array_keys($session->get('panier')));

        foreach ($products as $product) {
            $prixHT = ($product->getPrix() * $panier[$product->getId()]);
            $totalHT += $prixHT;
            $totalTTC = $totalHT + 5;

            $commande['product'][$product->getId()] = array('name' => $product->getName(), 'reference' =>$product->getRef(),'quantite' => $panier[$product->getId()], 'prix' => $product->getPrix(), 'prixHT' => $prixHT);
        }

        $commande['livraison'] = array('firstName'    => $livraison->getFirstName(),
            'lastName'     => $livraison->getLastName(),
            'streetNumber' => $livraison->getStreetNumber(),
            'streetName'   => $livraison->getStreetName(),
            'postalCode'   => $livraison->getPostalCode(),
            'city'         => $livraison->getCity(),
            'country'      => $livraison->getCountry());

        $commande['facturation'] = array('firstName'  => $facturation->getFirstName(),
            'lastName'     => $facturation->getLastName(),
            'streetNumber' => $facturation->getStreetNumber(),
            'streetName'   => $facturation->getStreetName(),
            'postalCode'   => $facturation->getPostalCode(),
            'city'         => $facturation->getCity(),
            'country'      => $facturation->getCountry());

        $commande['prixHT'] = round($totalHT,2);
        $commande['prixTTC'] = round($totalTTC,2);
        $commande['token'] = bin2hex($generator);

        return $commande;
    }

    public function prepareCommandeAction(Request $request) {

        $session= $request->getSession();
        $em = $this->getDoctrine()->getManager();

        if (!$session->has('commande'))
        {
            $commande = new Commande();

        }
        else {
            $commande = $em->getRepository('PPECommerceBundle:Commande')->find($session->get('commande'));
        }
        $commande->setDate(new \DateTime());
        $commande->setUser($this->container->get('security.token_storage')->getToken()->getUser());
        $commande->setValider(0);
        $commande->setReference(0);
        $commande->setContenuCommande($this->facture($request));

        if(!$session->has('commande')){
            $em->persist($commande);
            $session->set('commande',$commande);
        }
        $em->flush();

        return new Response($commande->getId());
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function validationCommandeAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('PPECommerceBundle:Commande')->find($id);

        if (!$commande || $commande->getValider() == 1)
            throw $this->createNotFoundException('La commande n\'existe pas');

        $commande->setValider(1);
        $commande->setReference($this->container->get('setNewReference')->reference());

        $em->flush();

        $session = $request->getSession();
        $session->remove('address');
        $session->remove('panier');
        $session->remove('commande');

        $message = (new \Swift_Message('Validation de votre commande'))
        ->setFrom('service.client.domy59@gmail.com')
        ->setTo($commande->getUser()->getEmailCanonical())
        ->setCharset('utf-8')
        ->setBody($this->renderView('PPECommerceBundle:Default:Mailer/mailValidationCommande.html.twig', array('user'=> $commande->getUser())), 'text/html');

        $this->get('mailer')->send($message);

        $this->get('session')->getFlashBag()->add('success','Votre commande est validé avec succès');
        return $this->redirect($this->generateUrl('factures'));
    }
}
