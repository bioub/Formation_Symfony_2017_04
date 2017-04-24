<?php

require_once 'Contact.php';

$ctc1 = new Contact;
$ctc2 = new Contact;
echo $ctc1->prenom . "\n"; // Jean
echo $ctc1->nom . "\n"; // Dupont
echo $ctc1->hello() . "\n"; // Bonjour
