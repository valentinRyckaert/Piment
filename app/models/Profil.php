<?php

namespace piment\models;

class Profil {

    private $id;
    private $tel;
    private $email;
    private $dateCreation;
    private $adresse;

    public function __construct($id ,$tel, $email, $dateCreation, $adresse) {
        $this->id = $id;
        $this->tel = $tel;
        $this->email = $email;
        $this->dateCreation = $dateCreation;
        $this->adresse = $adresse;
    }

    // Getters

    public function getId() {
        return $this->id;
    }
    public function getTel() {
        return $this->tel;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDateCreation() {
        return $this->dateCreation;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    // Setters
    public function setTel($tel) {
        // Vous pouvez ajouter une validation pour le format du numéro de téléphone ici
        $this->tel = $tel;
    }

    public function setEmail($email) {
        // Vous pouvez ajouter une validation pour le format de l'email ici
        $this->email = $email;
    }

    public function setDateCreation($dateCreation) {
        // Vous pouvez ajouter une validation pour le format de la date ici
        $this->dateCreation = $dateCreation;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }
}
