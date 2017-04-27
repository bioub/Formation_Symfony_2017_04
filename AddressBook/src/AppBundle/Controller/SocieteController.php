<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Societe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/societes")
 */
class SocieteController extends Controller
{
    /**
     * @Route("/")
     */
    public function listAction()
    {
        return $this->redirectToRoute('app_contact_list');
    }

    /**
     * @Route("/{id}")
     */
    public function showAction($id)
    {
        $repo = $this->getDoctrine()->getRepository(Societe::class);

        $societe = $repo->find($id);

        return $this->render('AppBundle:Societe:show.html.twig', array(
            'societe' => $societe
        ));
    }

}
