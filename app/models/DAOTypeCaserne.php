<?php

use piment\models;

class DAOTypeCaserne extends DAO {

    public function __construct($uneCnx)
    {
        parent::__construct(
            $uneCnx,
            TypeCaserne::class,
            'typecasernes',
            ['CodeTypeC','nomType']
        );
    }

}