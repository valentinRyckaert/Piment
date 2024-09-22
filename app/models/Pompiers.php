<?php
namespace piment\models;

class Pompiers
{
    private $Matricule;
    private $Prenom;
    private $Nom;
    private $chefAgret;
    private $DateNaissance;
    private $NumCaserne;
    private $codeGrade;
    private $Matriculerespo;

    /**
     * @return mixed
     */
    public function getMatricule()
    {
        return $this->Matricule;
    }

    /**
     * @param mixed $Matricule
     */
    public function setMatricule($Matricule): void
    {
        $this->Matricule = $Matricule;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * @param mixed $Prenom
     */
    public function setPrenom($Prenom): void
    {
        $this->Prenom = $Prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param mixed $Nom
     */
    public function setNom($Nom): void
    {
        $this->Nom = $Nom;
    }

    /**
     * @return mixed
     */
    public function getChefAgret()
    {
        return $this->chefAgret;
    }

    /**
     * @param mixed $chefAgret
     */
    public function setChefAgret($chefAgret): void
    {
        $this->chefAgret = $chefAgret;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->DateNaissance;
    }

    /**
     * @param mixed $DateNaissance
     */
    public function setDateNaissance($DateNaissance): void
    {
        $this->DateNaissance = $DateNaissance;
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
    public function setNumCaserne($NumCaserne): void
    {
        $this->NumCaserne = $NumCaserne;
    }

    /**
     * @return mixed
     */
    public function getCodeGrade()
    {
        return $this->codeGrade;
    }

    /**
     * @param mixed $codeGrade
     */
    public function setCodeGrade($codeGrade): void
    {
        $this->codeGrade = $codeGrade;
    }

    /**
     * @return mixed
     */
    public function getMatriculerespo()
    {
        return $this->Matriculerespo;
    }

    /**
     * @param mixed $Matriculerespo
     */
    public function setMatriculerespo($Matriculerespo): void
    {
        $this->Matriculerespo = $Matriculerespo;
    }

}