<?php

namespace Malta\Entity;

class Contact
{
    protected $prenom = 'Jean';
    protected $nom = 'Dupont';

    /**
     * @var Societe La société qui emploie le contact
     */
    protected $societe;

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = strtoupper($nom);
        return $this;
    }

    /**
     * @return Societe
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Permet d'associer la société au contact
     * @param Societe $societe
     * @return Contact
     */
    public function setSociete(Societe $societe)
    {
        $this->societe = $societe;
        return $this;
    }



    public function hello()
    {
        return "Bonjour je m'appelle $this->prenom $this->nom";
    }
}
