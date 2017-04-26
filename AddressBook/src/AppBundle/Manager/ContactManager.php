<?php

namespace AppBundle\Manager;


use AppBundle\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\DBAL\Connection;

class ContactManager
{
    /**
     * @var Registry
     */
    protected $doctrine;

    /**
     * ContactManager constructor.
     * @param Registry $doctrine
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }


    /**
     * @return array
     */
    public function getNbContactsBySociete()
    {
        $sql = "SELECT s.nom, COUNT(c.id) as nb_contacts
                FROM contact c
                LEFT JOIN societe s ON s.id = societe_id
                GROUP BY s.nom";

        /** @var Connection $connect */
        $connect = $this->doctrine->getConnection();
        $stmt = $connect->query($sql);
        return $stmt->fetchAll();
    }

    public function getAll()
    {
        $repo = $this->doctrine->getRepository(Contact::class);
        return $repo->findBy([], ['prenom' => 'ASC']);
    }

    public function getByIdWithSociete($id)
    {
        $repo = $this->doctrine->getRepository(Contact::class);
        return $repo->findWithSocieteInSql($id);
    }

    public function save(Contact $contact)
    {
        $em = $this->doctrine->getManager();
        $em->persist($contact);
        $em->flush();
    }
}