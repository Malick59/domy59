<?php

namespace PPE\UserBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PPE\UserBundle\Entity\Gender;



class LoadGender extends AbstractFixture implements OrderedFixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
            // On crée la catégorie
            $genderMr = new Gender();
            $genderMr->setName('Mr');
            $manager->persist($genderMr);

        $genderMme = new Gender();
        $genderMme->setName('Mme');
        $manager->persist($genderMme);

        $genderMlle = new Gender();
        $genderMlle->setName('Mlle');
        $manager->persist($genderMlle);

        $genderAutre = new Gender();
        $genderAutre->setName('Autre');
        $manager->persist($genderAutre);

        $manager->flush();

        $this->addReference('Mr', $genderMr);
        $this->addReference('Mme', $genderMme);
        $this->addReference('Mlle', $genderMlle);
        $this->addReference('Autre', $genderAutre);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 4;
    }
}