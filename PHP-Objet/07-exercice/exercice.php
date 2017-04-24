<?php

require_once 'Entity/Contact.php';
require_once 'Entity/CompteBancaire.php';

// 1 - Faire en sorte que le code suivant fonctionne
// - Créer un constructeur dans CompteBancaire qui
// initialise le solde à 0

$cptCourant = new \Malta\Entity\CompteBancaire();
$cptCourant->setType('Courant');

$ctc2 = new \Malta\Entity\Proprietaire();
$ctc2->setPrenom('Eric');
$ctc2->setNom('Martin');

$cptCourant->setProprietaire($ctc2);

echo 'Solde Initial : ' . $cptCourant->getSolde() . "\n"; // 0
$cptCourant->crediter(3000);
echo 'Solde après crédit : ' . $cptCourant->getSolde() . "\n"; // 3000
$cptCourant->debiter(500);
echo 'Solde après débit : ' . $cptCourant->getSolde() . "\n"; // 2500

echo $cptCourant->getProprietaire()->getPrenom() . ' ' .
    $cptCourant->getProprietaire()->getNom();



