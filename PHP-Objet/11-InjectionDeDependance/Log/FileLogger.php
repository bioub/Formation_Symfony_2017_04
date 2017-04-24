<?php

namespace Malta\Log;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;
use Psr\Log\LogLevel;

class FileLogger implements LoggerInterface
{
    use LoggerTrait;

    protected $fileRes;

    public function __construct($path)
    {
        $this->fileRes = fopen($path, 'a');
    }


    public function __destruct()
    {
        fclose($this->fileRes);
    }

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
        fwrite($this->fileRes, $line);
    }

}