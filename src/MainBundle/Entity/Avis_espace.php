<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avis_espace
 *
 * @ORM\Table(name="avis_espace")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\Avis_espaceRepository")
 */
class Avis_espace
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
     * @var int
     *
     * @ORM\Column(name="valeur", type="smallint")
     */
    private $valeur;


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
     * Set valeur
     *
     * @param integer $valeur
     *
     * @return Avis_espace
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return int
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * @ORM\ManyToOne(targetEntity="MainBundle\Entity\Espace")
     * @ORM\JoinColumn(name="IdEspace",referencedColumnName="id")
     *
     */
    private $espace;


    /**
     * @ORM\ManyToOne(targetEntity="MainBundle\Entity\User")
     * @ORM\JoinColumn(name="IdUser",referencedColumnName="id")
     *
     */
    private $user;

    /**
     * @return mixed
     */
    public function getEspace()
    {
        return $this->espace;
    }

    /**
     * @param mixed $espace
     */
    public function setEspace($espace)
    {
        $this->espace = $espace;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}

