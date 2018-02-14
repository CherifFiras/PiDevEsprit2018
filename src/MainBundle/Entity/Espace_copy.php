<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Espace
 *
 * @ORM\Table(name="espace_copy")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\Espace_copyRepository")
 */
class Espace_copy
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="lat", type="float")
     */
    private $lat;

    /**
     * @var float
     *
     * @ORM\Column(name="longi", type="float")
     */
    private $longi;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Espace_copy
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Espace_copy
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set lat
     *
     * @param float $lat
     *
     * @return Espace_copy
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set longi
     *
     * @param float $longi
     *
     * @return Espace_copy
     */
    public function setLongi($longi)
    {
        $this->longi = $longi;

        return $this;
    }

    /**
     * Get longi
     *
     * @return float
     */
    public function getLongi()
    {
        return $this->longi;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Espace_copy
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Espace_copy
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }



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
}

