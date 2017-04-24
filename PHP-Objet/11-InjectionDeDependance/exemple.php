<?php

require_once 'vendor/autoload.php';

$logger = new \Malta\Log\ConsoleLogger();
$calc = new \Malta\Calculette\Calculette($logger);
$calc->addition(1, 2);
$calc->soustraction(1, 2);