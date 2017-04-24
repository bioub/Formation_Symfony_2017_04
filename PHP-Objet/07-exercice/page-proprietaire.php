<?php

require_once 'Entity/Contact.php';
require_once 'Entity/CompteBancaire.php';

// 1 - Faire en sorte que le code suivant fonctionne
// - Créer un constructeur dans CompteBancaire qui
// initialise le solde à 0


$ctc2 = new \Malta\Entity\Proprietaire();
$ctc2->setPrenom('Eric');
$ctc2->setNom('Martin');

$cptCourant = new \Malta\Entity\CompteBancaire();
$cptCourant->setType('Courant');
$ctc2->addCompteBancaire($cptCourant);

$pel = new \Malta\Entity\CompteBancaire();
$pel->setType('PEL');
$ctc2->addCompteBancaire($pel);


// RENDU HTML
// ...
