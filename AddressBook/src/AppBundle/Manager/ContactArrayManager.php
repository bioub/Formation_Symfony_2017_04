<?php

namespace AppBundle\Manager;


use AppBundle\Entity\Contact;
use AppBundle\Entity\Societe;

class ContactArrayManager implements ContactManagerInterface
{
    /**
     * @var Contact[]
     */
    protected $contacts = [];

    public function __construct()
    {
        $google = new Societe();
        $google->setId(123);
        $google->setNom('Google');
        $google->setVille('Mountain View');

        $ctc1 = new Contact();
        $ctc1->setId(1);
        $ctc1->setPrenom('Larry');
        $ctc1->setNom('Page');
        $ctc1->setSociete($google);

        $ctc2 = new Contact();
        $ctc2->setId(2);
        $ctc2->setPrenom('Mark');
        $ctc2->setNom('Zuckerberg');

        $this->contacts[] = $ctc1;
        $this->contacts[] = $ctc2;
    }

    public function getNbContactsBySociete()
    {
        // TODO: Implement getNbContactsBySociete() method.
        return [];
    }

    public function getAll()
    {
        return $this->contacts;
    }

    public function getByIdWithSociete($id)
    {
        foreach ($this->contacts as $c) {
            if ($c->getId() == $id) {
                return $c;
            }
        }

        return null;
    }

    public function save(Contact $contact)
    {
        // TODO: Implement save() method.
    }
}