<?php

namespace PPE\CommerceBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PPE\CommerceBundle\Entity\Category;
use PPE\CommerceBundle\Entity\Product;



class LoadProduct extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $chargeurAllumeCigar = new Product();
        $chargeurAllumeCigar->setName('Chargeur Allume Cigare');
        $chargeurAllumeCigar->setRef('#CAC2');
        $chargeurAllumeCigar->setPrix(2);
        $chargeurAllumeCigar->setImage('img/chargeur-cigare.jpg');
        $chargeurAllumeCigar->setDescription('Allume cigare 12volts double port USB.');
        $chargeurAllumeCigar->setCategory($this->getReference('category-connect'));
        $manager->persist($chargeurAllumeCigar);

        $splitterMultiEcrans = new Product();
        $splitterMultiEcrans->setName('Splitter Multi-Écrans');
        $splitterMultiEcrans->setRef('#SME6');
        $splitterMultiEcrans->setPrix(6);
        $splitterMultiEcrans->setImage('img/splitter-multiEcrans.jpg');
        $splitterMultiEcrans->setDescription('Réplicateur port HDMI, 3 sorties.');
        $splitterMultiEcrans->setCategory($this->getReference('category-connect'));
        $manager->persist($splitterMultiEcrans);

        $multiprisesElectrique = new Product();
        $multiprisesElectrique->setName('Multiprises Electriques');
        $multiprisesElectrique->setRef('#ME5');
        $multiprisesElectrique->setPrix(5);
        $multiprisesElectrique->setImage('img/multiprise-electrique.jpg');
        $multiprisesElectrique->setCategory($this->getReference('category-connect'));
        $multiprisesElectrique->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');
        $manager->persist($multiprisesElectrique);

        $CableHDMI = new Product();
        $CableHDMI->setName('Cables HDMI');
        $CableHDMI->setRef('#CHDMI3');
        $CableHDMI->setPrix(3);
        $CableHDMI->setImage('img/cable-HDMI.jpg');
        $CableHDMI->setCategory($this->getReference('category-connect'));
        $CableHDMI->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');
        $manager->persist($CableHDMI);

        $cableVGA = new Product();
        $cableVGA->setName('Cables VGA');
        $cableVGA->setRef('#CVGA3');
        $cableVGA->setPrix(3);
        $cableVGA->setImage('img/cable-VGA.jpg');
        $cableVGA->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');
        $cableVGA->setCategory($this->getReference('category-connect'));
        $manager->persist($cableVGA);

        $cableJack = new Product();
        $cableJack->setName('Prise Jack 3.5mm');
        $cableJack->setRef('#PJ3');
        $cableJack->setPrix(3);
        $cableJack->setImage('img/prise-jack.jpg');
        $cableJack->setCategory($this->getReference('category-connect'));
        $cableJack->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($cableJack);


        $CableAntenne = new Product();
        $CableAntenne->setName('Cables Antenne');
        $CableAntenne->setRef('#CA3');
        $CableAntenne->setPrix(3);
        $CableAntenne->setImage('img/cable-antenne.jpg');
        $CableAntenne->setCategory($this->getReference('category-connect'));
        $CableAntenne->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($CableAntenne);

        $cableReseau = new Product();
        $cableReseau->setName('Cables Reseaux');
        $cableReseau->setRef('#CR7');
        $cableReseau->setPrix(7);
        $cableReseau->setImage('img/cable-reseau.jpg');
        $cableReseau->setCategory($this->getReference('category-connect'));
        $cableReseau->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($cableReseau);

        $switchCisco = new Product();
        $switchCisco->setName('Switch Cisco');
        $switchCisco->setRef('#SC29');
        $switchCisco->setPrix(29);
        $switchCisco->setImage('img/switch-cisco.jpg');
        $switchCisco->setCategory($this->getReference('category-connect'));
        $switchCisco->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($switchCisco);

        $cableUsbUniversel = new Product();
        $cableUsbUniversel->setName('Cable USB Universel');
        $cableUsbUniversel->setRef('#CUU2');
        $cableUsbUniversel->setPrix(2);
        $cableUsbUniversel->setImage('img/cable-usb-universel.jpg');
        $cableUsbUniversel->setCategory($this->getReference('category-connect'));
        $cableUsbUniversel->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($cableUsbUniversel);

        $Ampoule = new Product();
        $Ampoule->setName('Ampoules électriques');
        $Ampoule->setRef('#AE2');
        $Ampoule->setPrix(2);
        $Ampoule->setImage('img/ampoules-electriques.jpg');
        $Ampoule->setCategory($this->getReference('category-eclairage'));
        $Ampoule->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($Ampoule);

        $neons = new Product();
        $neons->setName('Néons');
        $neons->setRef('#N4');
        $neons->setPrix(4);
        $neons->setImage('img/neons.jpg');
        $neons->setCategory($this->getReference('category-eclairage'));
        $neons->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($neons);

        $luminaire = new Product();
        $luminaire->setName('Luminaire');
        $luminaire->setRef('#LU20');
        $luminaire->setPrix(20);
        $luminaire->setImage('img/luminaire.jpg');
        $luminaire->setCategory($this->getReference('category-eclairage'));
        $luminaire->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($luminaire);

        $lampePlasma = new Product();
        $lampePlasma->setName('Lampes à Plasma');
        $lampePlasma->setRef('#LP15');
        $lampePlasma->setPrix(15);
        $lampePlasma->setImage('img/lampe-plasma.jpg');
        $lampePlasma->setCategory($this->getReference('category-eclairage'));
        $lampePlasma->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($lampePlasma);

        $tabletteSmsg = new Product();
        $tabletteSmsg->setName('Tablette Samsung');
        $tabletteSmsg->setRef('#TS99');
        $tabletteSmsg->setPrix(99);
        $tabletteSmsg->setImage('img/tablette-samsung.jpg');
        $tabletteSmsg->setCategory($this->getReference('category-multimedia'));
        $tabletteSmsg->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($tabletteSmsg);

        $smartphoneHTC = new Product();
        $smartphoneHTC->setName('Smartphone HTC');
        $smartphoneHTC->setRef('#SH79');
        $smartphoneHTC->setPrix(79);
        $smartphoneHTC->setImage('img/smartphone-HTC.jpg');
        $smartphoneHTC->setCategory($this->getReference('category-multimedia'));
        $smartphoneHTC->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($smartphoneHTC);

        $teleLG = new Product();
        $teleLG->setName('Télé HD LG');
        $teleLG->setRef('#TLG199');
        $teleLG->setPrix(199);
        $teleLG->setImage('img/tele-lg.jpg');
        $teleLG->setCategory($this->getReference('category-multimedia'));
        $teleLG->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($teleLG);

        $iPad = new Product();
        $iPad->setName('iPad');
        $iPad->setRef('#IP200');
        $iPad->setPrix(200);
        $iPad->setImage('img/iPad.jpg');
        $iPad->setCategory($this->getReference('category-multimedia'));
        $iPad->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($iPad);

        $smartphoneHuawei = new Product();
        $smartphoneHuawei->setName('Smartphone Huawei');
        $smartphoneHuawei->setRef('#SHU69');
        $smartphoneHuawei->setPrix(69);
        $smartphoneHuawei->setImage('img/smartphone-huawei.jpg');
        $smartphoneHuawei->setCategory($this->getReference('category-multimedia'));
        $smartphoneHuawei->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($smartphoneHuawei);

        $ordinateurDell = new Product();
        $ordinateurDell->setName('Ordinateur Portable DELL');
        $ordinateurDell->setRef('#OPD200');
        $ordinateurDell->setPrix(200);
        $ordinateurDell->setImage('img/ordi-portable-DELL.jpg');
        $ordinateurDell->setCategory($this->getReference('category-multimedia'));
        $ordinateurDell->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($ordinateurDell);

        $playstation4 = new Product();
        $playstation4->setName('Playstation 4');
        $playstation4->setRef('#PS300');
        $playstation4->setPrix(360);
        $playstation4->setImage('img/ps4.jpg');
        $playstation4->setCategory($this->getReference('category-multimedia'));
        $playstation4->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($playstation4);

        $pincesCoupantes = new Product();
        $pincesCoupantes->setName('Pinces Coupantes');
        $pincesCoupantes->setRef('#PC9');
        $pincesCoupantes->setPrix(9);
        $pincesCoupantes->setImage('img/pinces-coupantes.jpg');
        $pincesCoupantes->setCategory($this->getReference('category-autre'));
        $pincesCoupantes->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($pincesCoupantes);

        $pincesDenudage = new Product();
        $pincesDenudage->setName('Pinces de dénudage');
        $pincesDenudage->setRef('#PD9');
        $pincesDenudage->setPrix(9);
        $pincesDenudage->setImage('img/pince-denudage.jpg');
        $pincesDenudage->setCategory($this->getReference('category-autre'));
        $pincesDenudage->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

        $manager->persist($pincesDenudage);

        $tournevis = new Product();
        $tournevis->setName('Tournevis');
        $tournevis->setRef('#TV1');
        $tournevis->setPrix(1);
        $tournevis->setImage('img/tournevis.jpg');
        $tournevis->setCategory($this->getReference('category-autre'));
        $tournevis->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');
        $manager->persist($tournevis);

        $manager->flush();
    }
    public function getOrder()
    {
        return 3;
    }
}