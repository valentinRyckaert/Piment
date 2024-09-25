<?php

namespace piment\models;

class DAOCaserne extends DAO {

    /**
     * @param $id
     * @return Caserne|null
     */
    public function find($id) : ?Caserne {
        $SQL = "select * from casernes where numCaserne = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $id);
        $preparedStatement->execute();
        $data = $preparedStatement->fetch(\PDO::FETCH_ASSOC);
        if ($data) {
            $caserne = new Caserne();
            foreach ($data as $key => $value) {
                $setter = 'set' . ucfirst($key);
                if (method_exists($caserne, $setter)) {
                    $caserne->$setter($value);
                }
            }
            return $caserne;
        }
        return null;
    }

    /**
     * @param $caserne
     * @return bool
     */
    public function remove($caserne): bool {
        $SQL = "delete from casernes where numCaserne = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $caserne->getNumCaserne());
        return $preparedStatement->execute();
    }

    /**
     * @param $caserne
     * @return bool
     */
    public function save($caserne): bool {
        $SQL = "insert into casernes values (:numCaserne, :adresse, :cp, :ville, :codeTypeC)";
        $preparedStatement = $this->cnx->prepare($SQL);
        return $preparedStatement->execute(array(
            "numCaserne" => $caserne->getNumCaserne(),
            "adresse" => $caserne->getAdresse(),
            "cp" => $caserne->getCP(),
            "ville" => $caserne->getVille(),
            "codeTypeC" => $caserne->getCodeTypeC()
        ));
    }

    /**
     * @param $caserne
     * @return bool
     */
    public function update($caserne): bool {
        $SQL = "update casernes set adresse=:adresse and cp=:cp and ville=:ville and codetypec=:codeTypeC where numCaserne = :numCaserne";
        $preparedStatement = $this->cnx->prepare($SQL);
        return $preparedStatement->execute(array(
            "numCaserne" => $caserne->getNumCaserne(),
            "adresse" => $caserne->getAdresse(),
            "cp" => $caserne->getCP(),
            "ville" => $caserne->getVille(),
            "codeTypeC" => $caserne->getCodeTypeC()
        ));
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function findAll(int $offset = 0, int $limit = 1024): array {
        $SQL = "select * from casernes";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        $casernes = [];
        foreach ($data as $row) {
            $caserne = new Caserne();
            foreach ($row as $key => $value) {
                $setter = 'set' . ucfirst($key);
                if (method_exists($caserne, $setter)) {
                    $caserne->$setter($value);
                }
            }
            $casernes[] = $caserne;
        }
        return $casernes;
    }

    /**
     * @return int
     */
    public function count(): int {
        $SQL = "select count(*) from casernes";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        return $preparedStatement->fetch();
    }
}