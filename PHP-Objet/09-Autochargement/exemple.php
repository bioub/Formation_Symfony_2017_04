<?php

use Malta\Entity\CompteBancaire;

require_once 'vendor/autoload.php';

// 1 - Faire en sorte que le code suivant fonctionne
// - Créer un constructeur dans CompteBancaire qui
// initialise le solde à 0
try {
    $cptCourant = new CompteBancaire();
    $cptCourant->setType(CompteBancaire::TYPE_PEL);

    $ctc2 = new \Malta\Entity\Contact();
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
}
catch (Exception $e) {
    $logger = new \Malta\Log\LoggerAvecInterface('app.log');
    $logger->log('Erreur : ' . $e->getMessage());
}



