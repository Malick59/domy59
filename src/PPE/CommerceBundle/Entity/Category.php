<?php

namespace PPE\CommerceBundle\Entity;

use Doctrine\Common\Collections\{
    ArrayCollection, Collection
};
use Doctrine\ORM\Mapping as ORM;
use PPE\CommerceBundle\Entity\Promo as Promo;


/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="PPE\CommerceBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="PPE\CommerceBundle\Entity\Product", mappedBy="category")
     */
    protected $products;

    /**
     * @ORM\ManyToOne(targetEntity="PPE\CommerceBundle\Entity\Promo", cascade={"persist"})
     */
    protected $promo;


    public function __construct()
    {
    }

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
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     *
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Get products
     *
     * @return Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Add promo
     *
     * @param \PPE\CommerceBundle\Entity\Promo $promo
     *
     * @return Category
     */
    public function setPromo(\PPE\CommerceBundle\Entity\Promo $promo)
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * Get promos
     *
     * @return Promo
     */
    public function getPromo()
    {
        return $this->promo;
    }

}
