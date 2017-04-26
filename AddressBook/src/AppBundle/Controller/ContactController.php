<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOStatement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/contacts")
 */
class ContactController extends Controller
{
    /**
     * @Route("/")
     */
    public function listAction()
    {
        $repo = $this->getDoctrine()->getRepository(Contact::class);
        $contacts = $repo->findBy([], ['prenom' => 'ASC']);

        $sql = "SELECT s.nom, COUNT(c.id) as nb_contacts
                FROM contact c
                LEFT JOIN societe s ON s.id = societe_id
                GROUP BY s.nom";

        /** @var Connection $connect */
        $connect = $this->getDoctrine()->getConnection();
        $stmt = $connect->query($sql);
        $statsBySociete = $stmt->fetchAll();

        return $this->render('AppBundle:Contact:list.html.twig', array(
            'contacts' => $contacts,
            'statsBySociete' => $statsBySociete
        ));
    }



    /**
     * @Route("/add")
     */
    public function addAction()
    {
        /*
        $contact = new Contact();
        $contact->setPrenom('Bill')->setNom('Gates');

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($contact);
        $em->flush();
        */

        return $this->render('AppBundle:Contact:add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}", requirements={"id": "[1-9][0-9]*"})
     */
    public function showAction($id)
    {
        $repo = $this->getDoctrine()->getRepository(Contact::class);

        $contact = $repo->findWithSocieteInSql($id);

        return $this->render('AppBundle:Contact:show.html.twig', array(
            'contact' => $contact
        ));
    }

}
