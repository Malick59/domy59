<?php

namespace PPE\CommerceBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PPE\CommerceBundle\Entity\Product;
use PPE\CommerceBundle\Entity\Promo;


class LoadPromo extends AbstractFixture implements OrderedFixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $promoSemaine = new Promo();
        $promoSemaine->setName('Promo de la semaine');
        $promoSemaine->setTauxReduc(20);

        $manager->persist($promoSemaine);

        $promoMois = new Promo();
        $promoMois->setName('Promo du mois');
        $promoMois->setTauxReduc(30);

        $manager->persist($promoMois);

        $manager->flush();

        $this->addReference('promo-semaine', $promoSemaine);
        $this->addReference('promo-mois', $promoMois);
    }
    public function getOrder() { return 1; }


}