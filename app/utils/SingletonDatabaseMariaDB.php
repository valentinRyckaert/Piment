<?php

namespace piment\utils;

// TODO : ajouter les annotations

class SingletonDatabaseMariaDB {
    private PDO $cnx;
    private static SingletonDatabaseMariaDB $instance;

    private function __construct() {
        $this->cnx = new PDO("mysql:host=127.0.0.1;dbname=pompiers","pompier_user","123+aze");
    }
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