<?php

namespace piment\utils;



class SingletonDatabaseMariaDB {
    private PDO $cnx;
    private static SingletonDatabaseMariaDB $instance;

    /**
     * Connection to the database
     */
    private function __construct() {
        $this->cnx = new PDO("mysql:host=127.0.0.1;dbname=pompiers","pompier_user","123+aze");
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

    public function getCnx(): PDO {
        return $this->cnx;
    }
}