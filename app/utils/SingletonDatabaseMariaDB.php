<?php

namespace piment\utils;



class SingletonDatabaseMariaDB {
    private \PDO $cnx;
    private static SingletonDatabaseMariaDB $instance;

    /**
     * Connection to the database
     * @param $data
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
     * Create if not exist a new instance
     * @param SingletonDatabaseMariaDB $instance
     * @return SingletonDatabaseMariaDB
     */
    public static function getInstance(): SingletonDatabaseMariaDB {
        if (!isset(self::$instance)) {
            self::$instance = new SingletonDatabaseMariaDB();
        }
        return self::$instance;
    }

    /**
     * return the PDO function
     * @return $this->cnx
     */
    public function getCnx(): \PDO {
        return $this->cnx;
    }
}