<?php

require_once 'Entity/Contact.php';
require_once 'Entity/Societe.php';

$mark = new \Malta\Entity\Contact();
$mark->setPrenom('Mark')
     ->setNom('Zuckerberg');

$societe = new \Malta\Entity\Societe();
$societe->setNom('Facebook')
        ->setVille('San Francisco');

$mark->setSociete($societe);

echo $mark->getPrenom() . "\n";
echo $mark->getNom() . "\n";
if ($mark->getSociete()) {
    echo $mark->getSociete()->getNom() . "\n";
}