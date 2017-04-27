<?php

namespace AppBundle\Manager;


use AppBundle\Entity\Contact;

interface ContactManagerInterface
{
    public function getNbContactsBySociete();
    public function getAll();
    public function getByIdWithSociete($id);
    public function save(Contact $contact);
}