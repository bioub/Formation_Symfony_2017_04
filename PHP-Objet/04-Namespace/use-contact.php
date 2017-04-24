<?php

require_once 'Entity/Contact.php';

use \Malta\Entity\Contact;

// FQCN ou FQN : Fully Qualified Class Name
$ctc1 = new \Malta\Entity\Contact();
echo $ctc1->getPrenom() . "\n"; // Jean
echo $ctc1->getNom() . "\n"; // Dupont
echo $ctc1->hello() . "\n"; // Bonjour

$ctc2 = new Contact();
$ctc2->setPrenom('Eric');
$ctc2->setNom('Martin');
echo $ctc2->getPrenom() . "\n"; // Jean
echo $ctc2->getNom() . "\n"; // Dupont