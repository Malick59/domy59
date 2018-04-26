<?php

namespace PPE\CommerceBundle\Entity;

use PPE\UserBundle\Entity\User ;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Commande
 *
 * @ORM\Table("commande")
 * @ORM\Entity(repositoryClass="PPE\CommerceBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="PPE\UserBundle\Entity\User", inversedBy="commandes")
     * @ORM\JoinColumn(nullable=true)
     */

    private $user;

    /**
     * @var boolean
     *
     * @ORM\Column(name="valider", type="boolean")
     */
    private $valider;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="reference", type="integer")
     */
    private $reference;

    /**
     * @var array
     *
     * @ORM\Column(name="contenuCommande", type="array")
     */
    private $contenuCommande;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set valider
     *
     * @param boolean $valider
     * @return Commande
     */
    public function setValider($valider)
    {
        $this->valider = $valider;

        return $this;
    }

    /**
     * Get valider
     *
     * @return boolean
     */
    public function getValider()
    {
        return $this->valider;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set reference
     *
     * @param integer $reference
     * @return Commande
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return integer
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set contenuCommande
     *
     * @param array $contenuCommande
     * @return Commande
     */
    public function setContenuCommande($contenuCommande)
    {
        $this->contenuCommande = $contenuCommande;

        return $this;
    }

    /**
     * Get contenuCommande
     *
     * @return array
     */
    public function getContenuCommande()
    {
        return $this->contenuCommande;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Commande
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}