<?php

namespace piment\controllers;

use piment\models\DAOPompiers;

class PompierController extends BaseController {

    public function __construct() {
        parent::__construct(DAOPompiers::class);
        $this->DAOName = "Pompier";
    }

}