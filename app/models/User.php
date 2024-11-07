<?php

namespace App\models;

use piment\models\Profil;

class User {
    private $id;
    private $login;
    private $passwdHash;
    private $name;
    private $username;
    private $status;
    private $dateClosure;

    private Profil $profil;

    public function __construct($id, $login, $passwdHash, $name, $username, $status, Profil $profil) {
        $this->id = $id;
        $this->login = $login;
        $this->passwdHash = $passwdHash;
        $this->name = $name;
        $this->username = $username;
        $this->status = $status;
        $this->dateClosure = 0;
        $this->profil = $profil;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPasswdHash() {
        return $this->passwdHash;
    }

    public function getName() {
        return $this->name;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getDateClosure(): int
    {
        return $this->dateClosure;
    }

    public function getProfil(): Profil
    {
        return $this->profil;
    }

    // Setters
    public function setLogin($login) {
        // Vous pouvez ajouter une validation pour l'unicité ici
        $this->login = $login;
    }

    public function setPasswdHash($passwdHash) {
        $this->passwdHash = $passwdHash;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setDateClosure(int $dateClosure): void
    {
        $this->dateClosure = $dateClosure;
    }
}
