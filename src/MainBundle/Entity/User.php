<?php
// src/AppBundle/Entity/User.php

namespace MainBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    protected $prenom;

    /**
     * @var Date
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    protected $date_naissance;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string" , length=1)
     */
    protected $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string" , length=255,nullable=true)
     */
    protected $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string" , length=255,nullable=true)
     */
    protected $region;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string" , length=255,nullable=true)
     */
    protected $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string" , length=255,nullable=true)
     */
    protected $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="place_naiss", type="string" , length=255,nullable=true)
     */
    protected $place_naiss;

    /**
     * @var string
     *
     * @ORM\Column(name="religion", type="string" , length=255,nullable=true)
     */
    protected $relegion;

    /**
     * @var string
     *
     * @ORM\Column(name="apropos", type="string" , length=255,nullable=true)
     */
    protected $apropos;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string" , length=255,nullable=true)
     */
    protected $facebook;
    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string" , length=255,nullable=true)
     */
    protected $twitter;
    /**
     * @var string
     *
     * @ORM\Column(name="instagram", type="string" , length=255,nullable=true)
     */
    protected $instagram;
    /**
     * @var string
     *
     * @ORM\Column(name="photoprofil", type="string" , length=255,nullable=true)
     */
    protected $photoprofil = "unknownphoto.jpg";

    /**
     * @return string
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @param string $occupation
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="occupation", type="string" , length=255,nullable=true)
     */
    protected $occupation;

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return string
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * @param string $instagram
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getApropos()
    {
        return $this->apropos;
    }

    /**
     * @param string $apropos
     */
    public function setApropos($apropos)
    {
        $this->apropos = $apropos;
    }

    /**
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param string $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return string
     */
    public function getPlaceNaiss()
    {
        return $this->place_naiss;
    }

    /**
     * @param string $place_naiss
     */
    public function setPlaceNaiss($place_naiss)
    {
        $this->place_naiss = $place_naiss;
    }

    /**
     * @return string
     */
    public function getRelegion()
    {
        return $this->relegion;
    }

    /**
     * @param string $relegion
     */
    public function setRelegion($relegion)
    {
        $this->relegion = $relegion;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param string $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return User
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->date_naissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return User
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }
<<<<<<< HEAD

    /**
     * @ORM\OneToMany(targetEntity="MainBundle\Entity\CentreInteret", mappedBy="user")
     */
    private $interets;

    /**
     * @ORM\OneToMany(targetEntity="MainBundle\Entity\Scolarite", mappedBy="user")
     */
    private $scolarites;

    /**
     * @ORM\OneToMany(targetEntity="MainBundle\Entity\Emploi", mappedBy="user")
     */
    private $emplois;

    /**
     * @ORM\OneToMany(targetEntity="MainBundle\Entity\Publication", mappedBy="user")
     */
    private $publications;

    /**
     * @ORM\OneToMany(targetEntity="MainBundle\Entity\Album", mappedBy="user")
     */
    private $albums;

    /**
     * @ORM\OneToMany(targetEntity="MainBundle\Entity\Loisir", mappedBy="user")
     */
    private $loisirs;

    /**
     * @return mixed
     */
    public function getAlbums()
    {
        return $this->albums;
    }

    /**
     * @param mixed $albums
     */
    public function setAlbums($albums)
    {
        $this->albums = $albums;
    }

    /**
     * @return mixed
     */
    public function getEmplois()
    {
        return $this->emplois;
    }

    /**
     * @param mixed $emplois
     */
    public function setEmplois($emplois)
    {
        $this->emplois = $emplois;
    }

    /**
     * @return mixed
     */
    public function getInterets()
    {
        return $this->interets;
    }

    /**
     * @param mixed $interets
     */
    public function setInterets($interets)
    {
        $this->interets = $interets;
    }

    /**
     * @return mixed
     */
    public function getScolarites()
    {
        return $this->scolarites;
    }

    /**
     * @param mixed $scolarites
     */
    public function setScolarites($scolarites)
    {
        $this->scolarites = $scolarites;
    }

    /**
     * @return mixed
     */
    public function getPublications()
    {
        return $this->publications;
    }

    /**
     * @param mixed $publications
     */
    public function setPublications($publications)
    {
        $this->publications = $publications;
    }

    /**
     * @return mixed
     */
    public function getLoisirs()
    {
        return $this->loisirs;
    }

    /**
     * @param mixed $loisirs
     */
    public function setLoisirs($loisirs)
    {
        $this->loisirs = $loisirs;
    }

    /**
     * @return string
     */
    public function getPhotoprofil()
    {
        return $this->photoprofil;
    }

    /**
     * @param string $photoprofil
     */
    public function setPhotoprofil($photoprofil)
    {
        $this->photoprofil = $photoprofil;
    }

=======
>>>>>>> 44aabbbdf88a90e1e2551f0155c9be0d1da759e2
}
