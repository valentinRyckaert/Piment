<?php

namespace piment\models;

class Caserne {

    private $NumCaserne;
    private $Adresse;
    private $CP;
    private $Ville;
    private $CodeTypeC;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getNumCaserne()
    {
        return $this->NumCaserne;
    }

    /**
     * @param mixed $NumCaserne
     */
    public function setNumCaserne($NumCaserne)
    {
        $this->NumCaserne = $NumCaserne;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->Adresse;
    }

    /**
     * @param mixed $Adresse
     */
    public function setAdresse($Adresse)
    {
        $this->Adresse = $Adresse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCP()
    {
        return $this->CP;
    }

    /**
     * @param mixed $CP
     */
    public function setCP($CP)
    {
        $this->CP = $CP;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->Ville;
    }

    /**
     * @param mixed $Ville
     */
    public function setVille($Ville)
    {
        $this->Ville = $Ville;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeTypeC()
    {
        return $this->CodeTypeC;
    }

    /**
     * @param mixed $CodeTypeC
     */
    public function setCodeTypeC($CodeTypeC)
    {
        $this->CodeTypeC = $CodeTypeC;
        return $this;
    }


}