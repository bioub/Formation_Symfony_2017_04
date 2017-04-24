<?php

require_once 'vendor/autoload.php';

$logPath = __DIR__ . '/app.log';
$logger = new \Malta\Log\LoggerAvecInterface($logPath);
$logger->debug('Test interface');

$logger = new \Malta\Log\LoggerAvecAbstract($logPath);
$logger->info('Version avec Classe Abstraite');

$logger = new \Malta\Log\FileLogger($logPath);
$logger->alert('Un problème grave');

