<?php

namespace piment\models; 

abstract class DAO {
    /* @var $cnx <PDO> */
    protected $cnx;

    public function __construct($cnx) {
        //TODO 
    }
    public abstract function find($id) ;

    public abstract function remove($model): bool; 
    public abstract function save($model): bool;
    public abstract function update($model): bool;
    public abstract function findAll(int $offset = 0, int $limit = 1024): array ;
    public abstract function count(): int ;
}