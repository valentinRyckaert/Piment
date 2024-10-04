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
            $object->setMatricule(htmlspecialchars($_POST['matricule']));
            $object->setPrenom(htmlspecialchars($_POST['prenom']));
            $object->setNom(htmlspecialchars($_POST['nom']));
            $object->setDateNaissance(htmlspecialchars($_POST['dateNaissance']));
            $object->setNumCaserne(htmlspecialchars($_POST['numCaserne']));
            $object->setCodeGrade(htmlspecialchars($_POST['codeGrade']));
            $object->setMatriculeRespo(htmlspecialchars($_POST['matriculeRespo']));
        }else if($this->DAOName == "Caserne") {
            $object = new Caserne();
            $object->setNumCaserne(htmlspecialchars($_POST['numCaserne']));
            $object->setAdresse(htmlspecialchars($_POST['adresse']));
            $object->setCp(htmlspecialchars($_POST['cp']));
            $object->setVille(htmlspecialchars($_POST['ville']));
            $object->setCodeTypeC(htmlspecialchars($_POST['codeTypeC']));
        }
        $this->DAO->save($object);
        $this->show();
    }

}