<?php

namespace piment\controllers;

use piment\models\DAORole;
use piment\models\Role;

class RoleController extends BaseController {

    public function __construct() {
        parent::__construct(DAORole::class,Role::class);
        $this->DAOName = "Role";
    }

}