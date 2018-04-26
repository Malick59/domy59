<?php

namespace PPE\CommerceBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PPE\CommerceBundle\Entity\Category;
use PPE\CommerceBundle\Entity\Promo;


class LoadCategory extends AbstractFixture implements OrderedFixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $categoryConnect = new Category();
        $categoryConnect->setName('Connectique');
        $categoryConnect->setPromo($this->getReference('promo-semaine'));
        $manager->persist($categoryConnect);

        $categoryEclairage = new Category();
        $categoryEclairage->setName('Eclairage');
        $manager->persist($categoryEclairage);

        $categoryMultimedia = new Category();
        $categoryMultimedia->setName('Multimedia');
        $categoryMultimedia->setPromo($this->getReference('promo-mois'));
        $manager->persist($categoryMultimedia);

        $categoryAutre = new Category();
        $categoryAutre->setName('Autre');
        $manager->persist($categoryAutre);

        // On déclenche l'enregistreme$categoryCablent de toutes les catégories
        $manager->flush();

        $this->addReference('category-connect', $categoryConnect);
        $this->addReference('category-eclairage', $categoryEclairage);
        $this->addReference('category-multimedia', $categoryMultimedia);
        $this->addReference('category-autre', $categoryAutre);
    }
    public function getOrder() { return 2; }
}