<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
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

        $contacts = $repo->findAll();

        return $this->render('AppBundle:Contact:list.html.twig', array(
            'contacts' => $contacts
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

        $contact = $repo->find($id);

        return $this->render('AppBundle:Contact:show.html.twig', array(
            'contact' => $contact
        ));
    }

}
