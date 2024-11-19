<?php

namespace piment\controllers;

use piment\models\User;
use piment\models\DAOUser;

class UserController extends BaseController {

    public function __construct() {
        parent::__construct(DAOUser::class,User::class);
        $this->DAOName = "User";
    }

}