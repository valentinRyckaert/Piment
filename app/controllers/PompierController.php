<?php

namespace piment\controllers;

use piment\models\DAOCaserne;
use piment\models\DAOPompiers;
use piment\utils\SingletonDatabaseMariaDB;
use piment\utils\Render;

class PompierController extends BaseController {

    private $DAOpompiers;
    private $PompierRender;

    public function __construct() {
        parent::__construct();
        $this->DAOpompiers = new DAOPompiers(SingletonDatabaseMariaDB::getInstance()->getCnx());
        $this->PompierRender = new Render();
    }

    public function create() {

    }

    /**
     * show all casernes, based on page number and items per page
     * @return string
     */
    public function show() : string {
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $items = isset($_GET['items']) ? $_GET['items'] : 1024;
        echo $this->PompierRender->render("ShowPompier",["lespompiers"=>$this->DAOpompiers->findAll($page*$items,$items)]);
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