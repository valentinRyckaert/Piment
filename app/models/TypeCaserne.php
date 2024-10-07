<?php


class TypeCaserne {

    private $codeTypeC;
    private $nomType;

    public function __construct($codeTypeC,$nomType)
    {
        $this->codeTypeC = $codeTypeC;
        $this->nomType = $nomType;
    }

    /**
     * @return mixed
     */
    public function getCodeTypeC()
    {
        return $this->codeTypeC;
    }

    /**
     * @param mixed $codeTypeC
     */
    public function setCodeTypeC($codeTypeC): void
    {
        $this->codeTypeC = $codeTypeC;
    }

    /**
     * @return mixed
     */
    public function getNomType()
    {
        return $this->nomType;
    }

    /**
     * @param mixed $nomType
     */
    public function setNomType($nomType): void
    {
        $this->nomType = $nomType;
    }


}