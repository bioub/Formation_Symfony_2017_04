<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(length=40)
     * @Assert\NotBlank()
     * @Assert\Length(max="40")
     */
    protected $prenom;

    /**
     * @var string
     *
     * @ORM\Column(length=40)
     * @Assert\NotBlank()
     * @Assert\Length(max="40")
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(length=80, nullable=true)
     * @Assert\Length(max="80")
     * @Assert\Email(strict=true)
     */
    protected $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=true)
     */
    protected $dateNaissance;

    /**
     * @var Societe
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Societe", inversedBy="contacts")
     */
    protected $societe;

    /**
     * @param int $id
     * @return Contact
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Contact
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Contact
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
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Contact
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set societe
     *
     * @param \AppBundle\Entity\Societe $societe
     *
     * @return Contact
     */
    public function setSociete(\AppBundle\Entity\Societe $societe = null)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return \AppBundle\Entity\Societe
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
