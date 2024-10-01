<?php

namespace piment\controllers;

class DefaultController extends BaseController {

    public function __construct() {
        parent::__construct(null);
    }

    public function index() : void {
        echo $this->renderer->render("Accueil");
    }

}