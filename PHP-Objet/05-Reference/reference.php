<?php

use Malta\Entity\Contact;

require_once 'Entity\Contact.php';

$p1 = 'Jean';
$p2 = $p1;
$p2 = 'Eric';
echo $p1 . "\n"; // Jean

$o1 = new Contact();
$o1->setPrenom('Jean');
$o2 = $o1;
$o2->setPrenom('Eric');
echo $o1->getPrenom() . "\n"; // Eric
