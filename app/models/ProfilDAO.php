<?php

namespace piment\models;

use piment\models\DAO;

class ProfilDAO extends DAO
{
    public function __construct($uneCnx) {
        parent::__construct(
            $uneCnx,
            Profil::class,
            'profil',
            ["id", "tel", "email", "dateCreation", "adresse"]
        );
    }
}