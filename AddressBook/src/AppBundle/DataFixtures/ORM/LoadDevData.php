<?php
// src/AppBundle/DataFixtures/ORM/LoadUserData.php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Societe;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Contact;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $apple = new Societe();
        $apple->setNom('Apple');
        $apple->setVille('Cupertino');

        $ctc1 = new Contact();
        $ctc1->setPrenom('Steve');
        $ctc1->setNom('Jobs');
        $ctc1->setSociete($apple);

        $ctc2 = new Contact();
        $ctc2->setPrenom('Bill');
        $ctc2->setNom('Gates');

        $manager->persist($apple);
        $manager->persist($ctc1);
        $manager->persist($ctc2);

        $manager->flush();
    }
}