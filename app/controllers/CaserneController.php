<?php

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
        $page = $_GET['page'];
        $items = $_GET['items'];
        return $this->caserneRender->render($page,$items);
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