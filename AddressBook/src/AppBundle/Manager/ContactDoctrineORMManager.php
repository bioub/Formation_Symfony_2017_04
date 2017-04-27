<?php

namespace AppBundle\Manager;


use AppBundle\Entity\Contact;
use Doctrine\ORM\EntityManager;

class ContactDoctrineORMManager implements ContactManagerInterface
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * ContactManager constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
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

        $connect = $this->em->getConnection();
        $stmt = $connect->query($sql);
        return $stmt->fetchAll();
    }

    public function getAll()
    {
        $repo = $this->em->getRepository(Contact::class);
        return $repo->findBy([], ['prenom' => 'ASC']);
    }

    public function getByIdWithSociete($id)
    {
        $repo = $this->em->getRepository(Contact::class);
        return $repo->findWithSocieteInSql($id);
    }

    public function save(Contact $contact)
    {
        $this->em->persist($contact);
        $this->em->flush();
    }
}