<?php

namespace piment\models;

use piment\utils\SingletonLogger;

class DAOUser extends DAO {
    public function __construct($uneCnx)
    {
        parent::__construct(
            $uneCnx,
            User::class,
            'user',
            ["id","login","passwdHash","name","username","status","dateclosure","profil_id","role_id"]
        );
    }

    public function find($id) {
        $SQL = "select * from user where id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue('id', $id);
        $preparedStatement->execute();
        $data = $preparedStatement->fetch(\PDO::FETCH_ASSOC);
        if ($data) {
            $user = new User();
            $user->setId($data['id']);
            $user->setLogin($data['login']);
            $user->setPasswdHash($data['passwdHash']);
            $user->setName($data['name']);
            $user->setUsername($data['username']);
            $user->setDateClosure($data['dateclosure']);
            $user->setStatus($data['status']);
            $user->setProfil_id($data['profil_id']);
            $user->setRole_id($data['role_id']);
            SingletonLogger::getInstance()->getSQLlogger()->warning("find User");
            return $user;
        }
        return null;
    }

    public function findByLoginPassword($login, $password): ?User{
        $SQL = "SELECT * FROM user WHERE login = :login AND passwdHash = :password";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue(':login', $login);
        $preparedStatement->bindValue(':password', hash('sha256',$password));
        $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC)[0];
        if($data) {
            $user = new User();
            $user->setId($data['id']);
            $user->setLogin($data['login']);
            $user->setPasswdHash($data['passwdHash']);
            $user->setName($data['name']);
            $user->setUsername($data['username']);
            $user->setDateClosure($data['dateclosure']);
            $user->setStatus($data['status']);
            $user->setProfil_id($data['profil_id']);
            $user->setRole_id($data['role_id']);
            SingletonLogger::getInstance()->getSQLlogger()->warning("verify login of user {$user->getLogin()}, success");
            return $user;
        }
        SingletonLogger::getInstance()->getSQLlogger()->warning("verify login of user, error");
        return null;
    }
}