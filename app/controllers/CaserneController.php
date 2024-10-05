<?php

namespace piment\controllers;

use piment\models\Caserne;
use piment\models\DAOCaserne;

class CaserneController extends BaseController {

    public function __construct() {
        parent::__construct(DAOCaserne::class,Caserne::class);
        $this->DAOName = "Caserne";
    }

}