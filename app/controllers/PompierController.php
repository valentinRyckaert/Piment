<?php

namespace piment\controllers;

use piment\utils\SingletonDatabaseMariaDB;
use piment\models\DAOPompiers;
use piment\utils\Render;
class PompierController extends BaseController
{
    private $DAOPompier;
    private $pompierRender;
    public function __contruct()
    {
        parent::__construct();
        $this->DAOPompier = new DAOPompiers(SingletonDatabaseMariaDB::getInstance()->getCnx());
        $this->pompierRender = new Render();

    }
    public function delete($id)
    {

    }
    public function creat()
    {

    }
    public function do_crate($data)
    {

    }

    public function update($id)
    {

    }

    public function do_update($id, $data)
    {

    }

    public function show($id)
    {
        $page = $_GET['page'];
        $items = $_GET['items'];
        return $this->pompierRender->render($page,$items);

    }



}