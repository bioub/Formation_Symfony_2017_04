<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Manager\ContactManager;
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
        $contactManager = $this->get('app.manager.contact_manager');
        $contacts = $contactManager->getAll();
        $statsBySociete = $contactManager->getNbContactsBySociete();

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
        $contactManager = $this->get('app.manager.contact_manager');
        $contact = $contactManager->getByIdWithSociete($id);

        return $this->render('AppBundle:Contact:show.html.twig', array(
            'contact' => $contact
        ));
    }

}
