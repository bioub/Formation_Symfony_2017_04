<?php


class Contact
{
    protected $prenom = 'Jean';
    protected $nom = 'Dupont';

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

    public function hello()
    {
        return "Bonjour je m'appelle $this->prenom $this->nom";
    }
}
