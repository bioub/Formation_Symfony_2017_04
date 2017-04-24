<?php

require_once 'Logger.php';

$filePath = __DIR__ . '/app.log';
$logger = new Logger($filePath);
$logger->log('Un message de log');
