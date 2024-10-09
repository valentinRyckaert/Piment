<?php

namespace piment\models; 

abstract class DAO {
    /* @var $cnx <PDO> */
    protected $cnx;
    protected $object;
    protected $TableName;
    protected $TableProps;

    public function __construct($uneCnx,$object,$TableName,$TableProps) {
        $this->cnx = $uneCnx;
        $this->object = new $object();
        $this->TableProps = $TableProps;
        $this->TableName = $TableName;
    }
    public function find($id) {
        $SQL = "select * from {$this->TableName} where {$this->TableProps[0]} = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue('id', $id);
        $preparedStatement->execute();
        $data = $preparedStatement->fetch(\PDO::FETCH_ASSOC);
        if ($data) {
            $foundObject = new $this->object();
            foreach ($data as $key => $value) {
                $setter = 'set' . ucfirst($key);
                if (method_exists($foundObject, $setter)) {
                    $foundObject->$setter($value);
                }
            }
            return $foundObject;
        }
        return null;
    }
    public function remove($object): bool {
        $SQL = "delete from {$this->TableName} where {$this->TableProps[0]} = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $getId = 'get' . ucfirst($this->TableProps[0]);
        if (method_exists($object, $getId)) {
            $preparedStatement->bindValue("id", $object->$getId());
            return $preparedStatement->execute();
        }
        return 0;
    }
    /**
     * @param $object
     * @return bool
     */
    public function save($object): bool {
        $SQL = "insert into {$this->TableName} values (";
        foreach($this->TableProps as $i => $prop) {
            if($i < count($this->TableProps)-1){
                $SQL = $SQL.":".$prop.", ";
            } else {
                $SQL = $SQL." :".$prop;
            }
        }
        $SQL = $SQL.")";
        $preparedStatement = $this->cnx->prepare($SQL);
        foreach ($this->TableProps as $prop) {
            $getter = 'get' . ucfirst($prop);
            if(method_exists($object,$getter)){
                $preparedStatement->bindValue($prop,$object->$getter());
            }
        }
        return $preparedStatement->execute();
    }

    /**
     * @param $object
     * @return bool
     */
    public function update($object): bool {
        $SQL = "update {$this->TableName} set ";
        foreach($this->TableProps as $prop) {
            $SQL = $SQL.$prop." = ".":".$prop.", ";
        }
        $SQL = $SQL."where ".$this->TableProps[0]." = ".":".$this->TableProps[0];
        $preparedStatement = $this->cnx->prepare($SQL);
        foreach ($this->TableProps as $prop) {
            $getter = 'get' . ucfirst($this->TableProps);
            if(method_exists($object,$getter)){
                $preparedStatement->bindValue($prop,$object->$getter());
            }
        }
        return $preparedStatement->execute();
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function findAll(int $offset=0, int $limit=1024): array {
        $SQL = "select * from {$this->TableName} limit :limit offset :offset";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue(":limit", $limit, \PDO::PARAM_INT);
        $preparedStatement->bindValue(":offset", $offset, \PDO::PARAM_INT);
        $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        $casernes = [];
        foreach ($data as $row) {
            $object = new $this->object();
            foreach ($row as $key => $value) {
                $setter = 'set' . ucfirst($key);
                if (method_exists($object, $setter)) {
                    $object->$setter($value);
                }
            }
            $casernes[] = $object;
        }
        return $casernes;
    }

    /**
     * @return int
     */
    public function count(): int {
        $SQL = "select count(*) from {$this->TableName}";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        return $preparedStatement->fetch();
    }

    public function searchByProp($prop, $value)
    {

        // Prepare the SQL statement with the column name directly in the query
        $SQL = "SELECT * FROM {$this->TableName} WHERE {$prop} LIKE :value";
        $preparedStatement = $this->cnx->prepare($SQL);

        // Bind the value parameter
        $preparedStatement->bindValue(':value', $value . '%');

        // Execute the statement
        $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        $casernes = [];
        foreach ($data as $row) {
            $object = new $this->object();
            foreach ($row as $key => $value) {
                $setter = 'set' . ucfirst($key);
                if (method_exists($object, $setter)) {
                    $object->$setter($value);
                }
            }
            $casernes[] = $object;
        }
        return $casernes;
    }
}