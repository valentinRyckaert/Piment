<?php

use piment\models\TypeCaserne;
use piment\models\DAOTypeCaserne;

class TypeCaserneController extends BaseController {

    public function __construct() {
        parent::__construct(DAOTypeCaserne::class,TypeCaserne::class);
        $this->DAOName = "TypeCaserne";
    }

}