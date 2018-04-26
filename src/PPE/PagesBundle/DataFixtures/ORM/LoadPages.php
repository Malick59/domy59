<?php
namespace Pages\PagesBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use PPE\PagesBundle\Entity\Pages;

class LoadPages extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $page1 = new Pages();
        $page1->setTitre('CGV');
        $page1->setContenu('
            <div class="row" style="padding-left: 20px; font-size: 150%; line-height: 1em;">
                <h4>1. PRIX</h4>     
<p>Les prix de vente des produits commercialisés sur le site Domy Ecommerce sont exprimés en euros, toutes taxes comprises (TTC). Ils ne tiennent pas compte de la TVA française en vigueur.</p>
<p>Les prix des produits s\'entendent hors participation forfaitaire aux frais de port et d\'emballage de 5,00 € en livraison normale.</p>
<p>Les produits présentés sont vendus dans la limite des stocks disponibles.</p>

<h4>2. COMMANDE</h4>
<p>Domy59 se réserve le droit de ne pas honorer une commande en cas de motif légitime (notamment défaut de paiement, adresse erronée, utilisation frauduleuse d\'un Code Avantage à usage strictement personnel et valable une seule fois).</p>
<p>Quel que soit votre moyen de commande, veuillez toujours rappeler vos nom et prénom.</p>
<p>Vous pouvez aussi utiliser le moteur de recherche de notre site pour rechercher un produit précisément.</p>
<p>Vous recevrez systématiquement un e-mail de confirmation de votre commande avec la confirmation de l\'ensemble des éléments de votre commande.</p>
<ul><li>Annonçant la préparation de votre colis</li>
<li>Annonçant l’expédition de votre colis. Les informations sur la disponibilité des articles sur le site vous sont données lors de la passation de la commande et rappelées sur votre facture.</li></ul>
<h4>3. AIDE</h4>
<p>Vous n\'avez pas trouvé le produit recherché sur le site ? Vous souhaitez obtenir un conseil ou un renseignement sur un produit ? Et surtout... vous souhaitez nous faire part de vos remarques ou suggestions? Nous vous invitons à nous contacter par e-mail à service.client.domy59@gmail.com</p>
                </div>');
        $manager->persist($page1);

        $page2 = new Pages();
        $page2->setTitre('Mentions légales');
        $page2->setContenu('
          <div class="row" style="padding: 10% 10%; font-size:1.5em ; line-height: 1em ; ">
            <p><strong>Domy Ecommerce</strong> est une enseigne <strong>Domy59</strong> <br/>
            Société par actions simplifiée au capital de 530.830 €<br/>
            <strong>Siège :</strong> 9 avenue linné, 59100 Roubaix <br/>
            <strong>E-mail de contact :</strong> service.client.domy59@gmail.com<br/>
            <strong>Directeur de la publication :</strong> Izzouzi Malick<br/>
            <strong>Hébergeur :</strong> OVH - 2 Rue Kellermann - 59100 Roubaix</p>
          </div>');
        $manager->persist($page2);

        $manager->flush();
    }

    public function getOrder()
    {
return 5;
    }
}
?>