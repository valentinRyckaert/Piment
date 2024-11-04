<?php

namespace piment\utils;


use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class SingletonLogger
{
    private $SQLlogger;
    private $Authlogger;

    public function __construct()
    {
        $this->SQLlogger = new Logger('SQL');
        $this->SQLlogger->pushHandler(new StreamHandler(__DIR__ . "/../../logs/SQL.log", Level::Warning));

        $this->Authlogger = new Logger('Auth');
        $this->Authlogger->pushHandler(new StreamHandler(__DIR__ . "/../../logs/Auth.log", Level::Warning));
    }

    public static function getInstance(): SingletonLogger
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new SingletonLogger();
        }
        return $instance;
    }

    public function getSQLlogger(): Logger
    {
        return $this->SQLlogger;
    }

    public function getAuthlogger(): Logger
    {
        return $this->Authlogger;
    }
}
