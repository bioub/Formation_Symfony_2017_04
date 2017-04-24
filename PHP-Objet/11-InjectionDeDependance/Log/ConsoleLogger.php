<?php

namespace Malta\Log;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class ConsoleLogger implements LoggerInterface
{
    use LoggerTrait;


    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        $date = date('H:i:s');
        $line = "[$level] [$date] $message\n";
        echo $line;
    }
}