<?php

namespace piment\controllers;

class DefaultController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function show() : void {
        echo \piment\utils\Render::render("Accueil");
    }

}