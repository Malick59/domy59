<?php

namespace PPE\UserBundle\Entity;

use Doctrine\Common\Collections\{
    ArrayCollection, Collection
};
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as FosUser;
use PPE\CommerceBundle\Entity\Commande;
use Symfony\Component\Validator\Constraints as Assert;
use PPE\UserBundle\Entity\Address;
use PPE\UserBundle\Entity\Gender;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="PPE\UserBundle\Repository\UserRepository")
 */
class User extends FosUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=100)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=100)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=12)
     */
    private $phone;

    /**
     * @var Address
     *
     * @ORM\OneToMany(targetEntity="PPE\UserBundle\Entity\Address", mappedBy="user", cascade={"persist"})
     */
    private $addresses;

    /**
     * @Assert\Range(
     *
     * min = 18,
     *
     * max = 100
     *     )
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @ORM\ManyToOne(targetEntity="PPE\UserBundle\Entity\Gender", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gender;

    /**
     * @ORM\OneToMany(targetEntity="PPE\CommerceBundle\Entity\Commande", mappedBy="user", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $commandes;

    /**
     * User constructor.
     *
     */
    public function __construct(){
        parent::__construct();
        $this->gender  = new ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set gender
     *
     * @param Gender $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set addresses
     *
     * @param Address $addresses
     *
     * @return User
     */
    public function addAddress($addresses)
    {
        $this->addresses[] = $addresses;

        return $this;
    }

    /**
     * Remove addresses
     *
     * @param Address $addresses
     */
    public function removeAdress(Address $addresses)
    {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->addresses;
    }


    /**
     * Add commandes
     *
     * @param Commande $commandes
     * @return User
     */
    public function addCommande(Commande $commandes)
    {
        $this->commandes[] = $commandes;
        return $this;
    }
    /**
     * Remove commandes
     *
     * @param Commande $commandes
     */
    public function removeCommande(Commande $commandes)
    {
        $this->commandes->removeElement($commandes);
    }
    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
        return $this->commandes;
    }
}
