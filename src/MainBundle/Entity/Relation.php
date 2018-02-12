<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relation
 *
 * @ORM\Table(name="relation")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\RelationRepository")
 */
class Relation
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
     * @ORM\Column(name="dateRelation", type="datetime")
     */
    private $dateRelation;


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
     * Set dateRelation
     *
     * @param \DateTime $dateRelation
     *
     * @return Relation
     */
    public function setDateRelation($dateRelation)
    {
        $this->dateRelation = $dateRelation;

        return $this;
    }

    /**
     * Get dateRelation
     *
     * @return \DateTime
     */
    public function getDateRelation()
    {
        return $this->dateRelation;
    }
}

