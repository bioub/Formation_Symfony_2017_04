<?php
/**
 * Created by PhpStorm.
 * User: Raya
 * Date: 24/04/2017
 * Time: 14:16
 */

namespace Malta\Entity;

class CompteBancaire
{
    protected $type;
    protected $solde;

    /**
     * @var Contact
     */
    protected $proprietaire;

    public function __construct()
    {
        $this->solde = 0;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return CompteBancaire
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * @param int $solde
     * @return CompteBancaire
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * @param Contact $proprietaire
     * @return CompteBancaire
     */
    public function setProprietaire(Contact $proprietaire)
    {
        $this->proprietaire = $proprietaire;
        return $this;
    }

    public function crediter($montant)
    {
        $this->solde += $montant;
        return $this;
    }

    public function debiter($montant)
    {
        $this->solde -= $montant;
        return $this;
    }
}