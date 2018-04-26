<?php

namespace PPE\CommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promo
 *
 * @ORM\Table(name="promo")
 * @ORM\Entity(repositoryClass="PPE\CommerceBundle\Repository\PromoRepository")
 */
class Promo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="tauxReduc", type="integer")
     */
    private $tauxReduc;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Promo
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set tauxReduc
     *
     * @param integer $tauxReduc
     *
     * @return Promo
     */
    public function setTauxReduc($tauxReduc)
    {
        $this->tauxReduc = $tauxReduc;

        return $this;
    }

    /**
     * Get tauxReduc
     *
     * @return int
     */
    public function getTauxReduc()
    {
        return $this->tauxReduc;
    }


}
