<?php

namespace piment\utils;



class SingletonDatabaseMariaDB {
    private \PDO $cnx;
    private static SingletonDatabaseMariaDB $instance;

    /**
     * Connection to the database
     */
    private function __construct() {
        $data = SingletonConfigReader::getInstance();
        $this->cnx = new \PDO(
            "mysql:host={$data->getValue("host","mariadb")};dbname={$data->getValue("dbname","mariadb")}",
            $data->getValue("user","mariadb"),
            $data->getValue("password","mariadb")
        );
    }

    /**
     *
     * @return SingletonDatabaseMariaDB
     */
    public static function getInstance(): SingletonDatabaseMariaDB {
        if (!isset(self::$instance)) {
            self::$instance = new SingletonDatabaseMariaDB();
        }
        return self::$instance;
    }

    public function getCnx(): \PDO {
        return $this->cnx;
    }
}