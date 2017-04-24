<?php

namespace Malta\Entity;


class Proprietaire extends Contact
{
    protected $numClient;

    /**
     * @var CompteBancaire[]
     */
    protected $compteBancaires = [];

    /**
     * @return CompteBancaire[]
     */
    public function getCompteBancaires()
    {
        return $this->compteBancaires;
    }

    /**
     * @param CompteBancaire $compteBancaire
     * @return Proprietaire
     */
    public function addCompteBancaire($compteBancaire)
    {
        $this->compteBancaires[] = $compteBancaire;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getNumClient()
    {
        return $this->numClient;
    }

    /**
     * @param mixed $numClient
     * @return Proprietaire
     */
    public function setNumClient($numClient)
    {
        $this->numClient = $numClient;
        return $this;
    }

}