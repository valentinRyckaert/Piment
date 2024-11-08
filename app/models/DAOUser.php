<?php

namespace piment\models;

use App\models\User;
use piment\utils\SingletonLogger;

class DAOUser extends DAO {
    public function __construct($uneCnx)
    {
        parent::__construct(
            $uneCnx,
            User::class,
            'user',
            ["id","login","passwdHash","name","username","dateclosure","status","profil_id","role"]
        );
    }

    public function findByLoginPassword($login, $password){
        $SQL = "SELECT * FROM user WHERE login = :login AND passwd = :password";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue(':login', $login);
        $preparedStatement->bindValue(':password', $password);
        $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        $user = new $this->object();
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($user, $setter)) {
                $user->$setter($value);
            }
        }
        SingletonLogger::getInstance()->getSQLlogger()->warning("verify login of user {$user->getLogin()}");
        return $user;
    }
}