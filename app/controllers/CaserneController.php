<?php

namespace piment\controllers;

use piment\models\DAOCaserne;

class CaserneController extends BaseController {

    public function __construct() {
        parent::__construct(DAOCaserne::class);
        $this->DAOName = "Caserne";
    }

}