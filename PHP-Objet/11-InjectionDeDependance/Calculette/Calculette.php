<?php

namespace Malta\Calculette;

use Malta\Log\ConsoleLogger;
use Malta\Log\FileLogger;
use Psr\Log\LoggerInterface;

class Calculette
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        // Composition : mauvaise pratique
        // $this->logger = new ConsoleLogger();

        $this->logger = $logger;
    }

    public function addition($a, $b)
    {
        $somme = $a + $b;
        $this->logger->debug("$a + $b = $somme");
        return $somme;
    }

    public function soustraction($a, $b)
    {
        $difference = $a - $b;
        $this->logger->debug("$a - $b = $difference");
        return $difference;
    }
}