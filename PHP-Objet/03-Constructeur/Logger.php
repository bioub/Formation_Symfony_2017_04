<?php

class Logger
{
    protected $fileRes;

    public function __construct($path)
    {
        $this->fileRes = fopen($path, 'a');
    }

    public function log($msg)
    {
        $date = date('H:i:s');
        $line = "[$date] $msg\n";
        fwrite($this->fileRes, $line);
    }

    public function __destruct()
    {
        fclose($this->fileRes);
    }
}