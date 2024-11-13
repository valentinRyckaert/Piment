<?php

namespace piment\models;

use piment\utils\SingletonDatabaseMariaDB;
use piment\utils\SingletonLogger;

class DAOUser extends DAO {
    public function __construct($uneCnx)
    {
        parent::__construct(
            $uneCnx,
            User::class,
            'user',
            ["id","login","passwdHash","name","username","dateclosure","status","profil_id","role_id"]
        );
    }

    public function findByLoginPassword($login, $password): ?User{
        $SQL = "SELECT * FROM user WHERE login = :login AND passwdHash = :password";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue(':login', $login);
        $preparedStatement->bindValue(':password', hash('sha256',$password));
        $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC)[0];

        $user = new User();
        $user->setId($data['id']);
        $user->setLogin($data['login']);
        $user->setPasswdHash($data['passwdHash']);
        $user->setName($data['name']);
        $user->setUsername($data['username']);
        $user->setDateClosure($data['dateclosure']);
        $user->setStatus($data['status']);
        $DAOProfil = new DAOProfil(SingletonDatabaseMariaDB::getInstance()->getCnx());
        $DAORole = new DAORole(SingletonDatabaseMariaDB::getInstance()->getCnx());
        $user->setProfil($DAOProfil->find($data['profil_id']));
        $user->setRole($DAORole->find($data['role_id']));
        SingletonLogger::getInstance()->getSQLlogger()->warning("verify login of user {$user->getLogin()}");
        return $user;
    }
}