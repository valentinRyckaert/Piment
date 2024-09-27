<?php

namespace piment\controllers;

class DefaultController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        return \piment\utils\Render::render("Accueil");
    }

}