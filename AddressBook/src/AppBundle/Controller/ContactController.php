<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use AppBundle\Manager\ContactManager;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOStatement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/contacts")
 */
class ContactController extends Controller
{
    /**
     * @Route("/")
     */
    public function listAction(Request $request)
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
    public function addAction(Request $request)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $contactManager = $this->get('app.manager.contact_manager');
            $contact = $form->getData();
            $contactManager->save($contact);

            $this->addFlash('success', "Le contact {$contact->getPrenom()} a bien été inséré");

            return $this->redirectToRoute('app_contact_list');
        }

        return $this->render('AppBundle:Contact:add.html.twig', array(
            'contactForm' => $form->createView()
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
