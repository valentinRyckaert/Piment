<?php

namespace piment\controllers;

use piment\models\DAOCaserne;
use piment\utils\SingletonDatabaseMariaDB;
use piment\utils\Render;

class CaserneController extends BaseController {

    private $DAOcaserne;
    private $caserneRender;

    public function __construct() {
        parent::__construct();
        $this->DAOcaserne = new DAOCaserne(SingletonDatabaseMariaDB::getInstance()->getCnx());
        $this->caserneRender = new Render();
    }

    public function create() {

    }

    /**
     * show all casernes, based on page number and items per page
     * @return void
     */
    public function show() {
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $items = isset($_GET['items']) ? $_GET['items'] : 1024;
        echo $this->caserneRender->render("ShowCasernes",["lesCasernes"=>$this->DAOcaserne->findAll($page*$items,$items)]);
    }

    public function detail($id) {
        echo $this->caserneRender->render("ShowOneCaserne",["laCaserne"=>$this->DAOcaserne->find($id)]);
    }

    public function update() {

    }

    public function do_update($id, $data) {

    }

    public function delete($id) {

    }

    public function db_create($data) {

    }

}