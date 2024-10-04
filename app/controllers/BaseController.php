<?php

namespace piment\controllers;

use piment\models\Caserne;
use piment\models\Pompier;
use piment\utils\Render;
use piment\utils\SingletonDatabaseMariaDB;

abstract class BaseController {

    private $DAO;
    protected $DAOName;
    protected $renderer;

    public function __construct($DAO) {
        $this->DAO = $DAO != null ? new $DAO(SingletonDatabaseMariaDB::getInstance()->getCnx()) : null;
        $this->renderer = new Render();
    }

    public function create() {
        echo $this->renderer->render("CreateOne{$this->DAOName}");
    }

    /**
     * show all casernes, based on page number and items per page
     * @return void
     */
    public function show() {
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $items = isset($_GET['items']) ? $_GET['items'] : 1024;
        echo $this->renderer->render("Show{$this->DAOName}s",["les{$this->DAOName}s"=>$this->DAO->findAll($page*$items,$items)]);
    }

    public function detail($id) {
        echo $this->renderer->render("ShowOne{$this->DAOName}",["one{$this->DAOName}"=>$this->DAO->find($id)]);
    }

    public function update() {

    }

    public function do_update($id, $data) {

    }

    public function delete($id) {
    echo $this->renderer->render("SuppressOne{$this->DAOName}",["one{$this->DAOName}"=>$this->DAO->find($id)]);
    }

    public function do_create() {
        if($this->DAOName == "Pompier") {
            $object = new Pompier();
            $object->setMatricule($_POST['matricule']);
            $object->setPrenom($_POST['prenom']);
            $object->setNom($_POST['nom']);
            $object->setDateNaissance($_POST['dateNaissance']);
            $object->setNumCaserne($_POST['numCaserne']);
            $object->setCodeGrade($_POST['codeGrade']);
            $object->setMatriculeRespo($_POST['matriculeRespo']);
        }else if($this->DAOName == "Caserne") {
            $object = new Caserne();
            $object->setNumCaserne($_POST['numCaserne']);
            $object->setAdresse($_POST['adresse']);
            $object->setCp($_POST['cp']);
            $object->setVille($_POST['ville']);
            $object->setCodeTypeC($_POST['codeTypeC']);
        }
        $this->DAO->save($object);
        $this->show();
    }

}