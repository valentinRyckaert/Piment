<?php

namespace piment\models;

use App\models\User;

class UserDAO extends DAO {
    public function __construct($uneCnx)
    {
        parent::__construct(
            $uneCnx,
            User::class,
            'user',
            ["id","login","passwdHash","name","username","dateclosure","status","profil_id"]
        );
    }
}