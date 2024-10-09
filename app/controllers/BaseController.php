<?php

namespace piment\controllers;

use piment\utils\CsrfToken;
use piment\utils\Render;
use piment\utils\SingletonDatabaseMariaDB;

abstract class BaseController {

    private $DAO;
    protected $DAOName;
    protected $DAOObject;
    protected $renderer;

    public function __construct($DAO,$object=null) {
        $this->DAO = $DAO != null ? new $DAO(SingletonDatabaseMariaDB::getInstance()->getCnx()) : null;
        $this->DAOObject = $object;
        $this->renderer = new Render();
    }

    public function create() {
        echo $this->renderer->render(
            "CreateOne{$this->DAOName}",
            ["csrf_token"=>CsrfToken::generateToken()]
        );
    }

    /**
     * Show all casernes, based on page number and items per page
     *
     * @return void
     */
    public function show() {
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $items = isset($_GET['items']) ? $_GET['items'] : 1024;
        echo $this->renderer->render("Show{$this->DAOName}s",["les{$this->DAOName}s"=>$this->DAO->findAll($page*$items,$items)]);
    }

    public function showByItem() {
        //$prop = htmlspecialchars($_GET['prop']);
        if ($this->DAOName == "Caserne") {
            $prop = "numcaserne";
        } else {
            $prop = "matricule";
        }
        $value = htmlspecialchars($_GET['value']);
        echo $this->renderer->render("Show{$this->DAOName}s",["les{$this->DAOName}s"=>$this->DAO->searchByProp($prop,$value)]);
    }

    public function detail($id) {
        echo $this->renderer->render("ShowOne{$this->DAOName}",["one{$this->DAOName}"=>$this->DAO->find($id)]);
    }

    public function update() {

    }

    public function do_update($id, $data) {

    }

    public function delete($id) {
        echo $this->renderer->render(
            "SuppressOne{$this->DAOName}",
            [
                "one{$this->DAOName}"=>$this->DAO->find($id),
                "csrf_token"=>CsrfToken::generateToken()
            ]
        );
    }

    public  function do_delete() {
        if(!CsrfToken::checkToken(htmlspecialchars($_POST['csrf_token']))) {
            echo $this->renderer->render("SessionError");
        } else {
            $this->DAO->remove($this->DAO->find($_POST['id']));
            $this->show();
        }
    }

    public function do_create() {
        if(!CsrfToken::checkToken(htmlspecialchars($_POST['csrf_token']))) {
            echo $this->renderer->render("SessionError");
        } else {
            $object = new $this->DAOObject();
            foreach ($_POST as $key => $value) {
                $setter = 'set' . ucfirst($key);
                if (method_exists($object, $setter)) {
                    $object->$setter($value);
                }
            }
            $this->DAO->save($object);
            $this->show();
        }
    }
}
