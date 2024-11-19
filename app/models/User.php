<?php

namespace piment\models;

class User {
    private $id;
    private $login;
    private $passwdHash;
    private $name;
    private $username;
    private $status;
    private $dateClosure;
    private $profil_id;
    private $role_id;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPasswdHash()
    {
        return $this->passwdHash;
    }

    /**
     * @param mixed $passwdHash
     */
    public function setPasswdHash($passwdHash): void
    {
        $this->passwdHash = $passwdHash;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDateClosure()
    {
        return $this->dateClosure;
    }

    /**
     * @param mixed $dateClosure
     */
    public function setDateClosure($dateClosure): void
    {
        $this->dateClosure = $dateClosure;
    }

    public function getProfil_id(): int
    {
        return $this->profil_id;
    }

    public function setProfil_id(int $profil): void
    {
        $this->profil_id = $profil;
    }

    public function getRole_id(): int
    {
        return $this->role_id;
    }

    public function setRole_id(int $role): void
    {
        $this->role_id = $role;
    }
}
