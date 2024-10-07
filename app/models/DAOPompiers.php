<?php

namespace piment\models;

class DAOPompiers extends DAO {

    public function __construct($uneCnx)
    {
        parent::__construct(
            $uneCnx,
            Pompier::class,
            'pompiers',
            ['matricule','prenom','nom','chefagret','datenaissance','numcaserne','codegrade','matriculerespo']
        );
    }
}