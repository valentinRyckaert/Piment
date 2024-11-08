<?php

namespace piment\controllers;

use App\models\User;
use piment\utils\Auth;
use piment\utils\CsrfToken;

class DefaultController extends BaseController {

    public function __construct() {
        parent::__construct(null);
    }

    public function index() : void {
        if(Auth::is_logged())
            echo $this->renderer->render("Accueil");
        else
            $this->login();
    }

    public function login() {
        echo $this->renderer->render(
            "Login",
            ["csrf_token"=>CsrfToken::generateToken()]
        );
    }

    public function do_login(){
        if(!CsrfToken::checkToken(htmlspecialchars($_POST['csrf_token']))) {
            echo $this->renderer->render("SessionError");
        } else {
            if($user = Auth::login(htmlspecialchars($_POST['login']),htmlspecialchars($_POST['passwd']))) {
                $this->index();
            } else {
                echo $this->renderer->render("SessionError");
            }
        }
    }

    public function logout() {
        Auth::logout();
        echo $this->renderer->render(
            "Login",
        );
    }

}