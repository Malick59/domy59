<?php

namespace PPE\CommerceBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class GetReference {

    public function __construct(ContainerInterface $container, $entityManager)
    {
        $this->em = $entityManager;
        $this->securityContext= $container->get('security.token_storage');
    }

    public function reference()
    {
        $reference = $this->em->getRepository('PPECommerceBundle:Commande')->findOneBy(array('valider' => 1), array('id' => 'DESC'),1,1);

        if (!$reference)
            return 1;
        else
            return $reference->getReference() +1;
    }
}
?>

