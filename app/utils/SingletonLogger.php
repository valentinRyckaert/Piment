<?php

namespace piment\utils;


use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class SingletonLogger
{
    private $log;

    public function __construct(string $loggerName)
    {
        $this->log = new Logger($loggerName);
        $this->log->pushHandler(new StreamHandler(__DIR__ . "/../../logs/{$this->loggerName}.log", Level::Warning));
    }
}