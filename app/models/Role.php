<?php

namespace piment\models;

class Role {
    private $id;
    private $libelle;
    private $permissions;

    public function __construct($id, $libelle, int $permissions) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->permissions = $permissions;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function getPermissions() {
        return $this->permissions;
    }

    // Setters
    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    public function setPermissions(int $permissions) {
        $this->permissions = $permissions;
    }
}