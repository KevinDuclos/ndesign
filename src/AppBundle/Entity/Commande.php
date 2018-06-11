<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use User\UserBundle\Entity\User;

/**
 * commande
 *
 * @ORM\Table(name="ND_commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="commande")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Produit", inversedBy="commandes")
     */
    private $produits;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user.
     *
     * @param \User\UserBundle\Entity\User $user
     *
     * @return Commande
     */
    public function addUser(\User\UserBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user.
     *
     * @param \User\UserBundle\Entity\User $user
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUser(\User\UserBundle\Entity\User $user)
    {
        return $this->users->removeElement($user);
    }

    /**
     * Get users.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

  

   

    /**
     * Set users.
     *
     * @param \User\UserBundle\Entity\User|null $users
     *
     * @return Commande
     */
    public function setUsers(\User\UserBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Set produits.
     *
     * @param \AppBundle\Entity\Produit|null $produits
     *
     * @return Commande
     */
    public function setProduits(\AppBundle\Entity\Produit $produits = null)
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     * Get produits.
     *
     * @return \AppBundle\Entity\Produit|null
     */
    public function getProduits()
    {
        return $this->produits;
    }
}
