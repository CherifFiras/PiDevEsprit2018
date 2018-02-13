<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\EvenementRepository")
 */
class Evenement
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
     * @ORM\Column(name="dateEvenement", type="datetime")
     */
    private $dateEvenement;

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
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="titreCordination", type="string", length=255)
     */
    private $titreCordination;

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
     * Set dateEvenement
     *
     * @param \DateTime $dateEvenement
     *
     * @return Evenement
     */
    public function setDateEvenement($dateEvenement)
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    /**
     * Get dateEvenement
     *
     * @return \DateTime
     */
    public function getDateEvenement()
    {
        return $this->dateEvenement;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Evenement
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
     * @return Evenement
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
     * @return Evenement
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
     * @return Evenement
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
     * Set titreCordination
     *
     * @param string $titreCordination
     *
     * @return Evenement
     */
    public function setTitreCordination($titreCordination)
    {
        $this->titreCordination = $titreCordination;

        return $this;
    }

    /**
     * Get titreCordination
     *
     * @return string
     */
    public function getTitreCordination()
    {
        return $this->titreCordination;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Evenement
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
}
