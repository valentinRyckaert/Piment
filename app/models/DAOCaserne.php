<?php

namespace piment\models;

class DAOCaserne extends DAO {

    /**
     * @param $id
     * @return \Caserne|null
     */
    public function find($id) : ?\Caserne {
        $SQL = "select * from casernes where numCaserne = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $id);
        $preparedStatement->execute();
        return $preparedStatement->fetchObject("Caserne");
    }

    /**
     * @param $caserne
     * @return bool
     */
    public function remove($caserne): bool {
        $SQL = "delete from casernes where numCaserne = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $caserne->getNumCaserne());
        $preparedStatement->execute();
        return 1;
    }

    /**
     * @param $caserne
     * @return bool
     */
    public function save($caserne): bool {
        $SQL = "insert into casernes values (:numCaserne, :adresse, :cp, :ville, :codeTypeC)";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute(array(
            "numCaserne" => $caserne->getNumCaserne(),
            "adresse" => $caserne->getAdresse(),
            "cp" => $caserne->getCP(),
            "ville" => $caserne->getVille(),
            "codeTypeC" => $caserne->getCodeTypeC()
        ));
        return 1;
    }

    /**
     * @param $caserne
     * @return bool
     */
    public function update($caserne): bool {
        $SQL = "update casernes set adresse=:adresse and cp=:cp and ville=:ville and codetypec=:codeTypeC where numCaserne = :numCaserne";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute(array(
            "numCaserne" => $caserne->getNumCaserne(),
            "adresse" => $caserne->getAdresse(),
            "cp" => $caserne->getCP(),
            "ville" => $caserne->getVille(),
            "codeTypeC" => $caserne->getCodeTypeC()
        ));
        return 1;
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
        return $preparedStatement->fetchObject("Caserne");
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