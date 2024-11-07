<?php

namespace piment\models;

use piment\models\DAO;

class RoleDAO extends DAO
{
    public function __construct($uneCnx) {
        parent::__construct(
            $uneCnx,
            Role::class,
            'role',
            ["id", "libelle", "permissions"]
        );
    }
}