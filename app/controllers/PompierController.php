<?php

namespace piment\controllers;

use piment\models\DAOPompiers;
use piment\models\Pompier;

class PompierController extends BaseController {

    public function __construct() {
        parent::__construct(DAOPompiers::class,Pompier::class);
        $this->DAOName = "Pompier";
    }

}