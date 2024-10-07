<?php

namespace piment\models;

class DAOCaserne extends DAO {

    public function __construct($uneCnx)
    {
        parent::__construct(
            $uneCnx,
            Caserne::class,
            'casernes',
            ['numcaserne','addresse','CP','ville','CodeTypeC']
        );
    }
}