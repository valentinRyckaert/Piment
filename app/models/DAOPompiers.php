<?php

namespace piment\models;

class DAOPompiers extends DAO {

    public function find($id) : ?pompiers {
        $SQL = "select * from pompiers where Matricule = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $id);
        $preparedStatement->execute();
        $data = $preparedStatement->fetch(\PDO::FETCH_ASSOC);
        if ($data) {
            $pompiers = new Pompiers();
            foreach ($data as $key => $value) {
                $setter = 'set' . ucfirst($key);
                if (method_exists($pompiers, $setter)) {
                    $pompiers->$setter($value);
                }
            }
            return $pompiers;
        }
        return null;
    }

    public function remove($pompier): bool {
    $SQL = "delete from pompiers where Matricule = :id";
    $preparedStatement = $this->cnx->prepare($SQL);
    $preparedStatement->bindValue("id", $pompier->getMatricule());
    $preparedStatement->execute();
    return 1;
    }
    public function save($pompier): bool {
    $SQL = "insert into pompiers values (:Matricule, :Prenom, :Nom, :chefAgret, :DateNaissance, :NumCaserne, :codeGrade, :Matriculerespo)";
    $preparedStatement = $this->cnx->prepare($SQL);
    return $preparedStatement->execute(array(
        "Matricule" => $pompier->getMatricule(),
        "Prenom" => $pompier->getPrenom(),
        "Nom" => $pompier->getNom(),
        "chefAgret" => $pompier->getChefAgret(),
        "DateNaissance" => $pompier->getDateNaissance(),
        "NumCaserne" => $pompier->getNumCaserne(),
        "codeGrade" => $pompier->getCodeGrade(),
        "Matriculerespo" => $pompier->getMatriculerespo()
    ));
    }
    public function update($pompier): bool {
    $SQL = "update pompiers set Prenom=:Prenom and Nom=:Nom and chefAgret=:chef and DateNaissance=:DateNaissance and NumCaserne=:NumCaserne and codeGrade=:codeGrade and Matriculerespo=:Matriculerespo where Matricule = :Matricule";
    $preparedStatement = $this->cnx->prepare($SQL);
    return $preparedStatement->execute(array(
        "Matricule" => $pompier->getMatricule(),
        "Prenom" => $pompier->getPrenom(),
        "Nom" => $pompier->getNom(),
        "chefAgret" => $pompier->getChefAgret(),
        "DateNaissance" => $pompier->getDateNaissance(),
        "NumCaserne" => $pompier->getNumCaserne(),
        "codeGrade" => $pompier->getCodeGrade(),
        "Matriculerespo" => $pompier->getMatriculerespo()
    ));
    }
    public function findAll(int $offset = 0, int $limit = 1024): array {
    $SQL = "SELECT * FROM pompiers";
    $preparedStatement = $this->cnx->prepare($SQL);
    $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        $pompier = [];
        foreach ($data as $row) {
            $pompiers = new pompier();
            foreach ($row as $key => $value) {
                $setter = 'set' . ucfirst($key);
                if (method_exists($pompiers, $setter)) {
                    $pompiers->$setter($value);
                }
            }
            $pompier[] = $pompiers;
        }
        return $pompier;
    }
    public function count(): int {
        $SQL = "SELECT COUNT(*) FROM pompiers";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        return $preparedStatement->fetch();
    }
}