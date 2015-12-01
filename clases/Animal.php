<?php

//POJO - plana
class Animal {

    private $IDAnimal, $Familia, $NombreAnimal, $PeligroExt, $Edad, $cuidadorCode, $ZonaCode;

    //1º Constructor -> null
    function __construct($IDAnimal = null, $Familia = null, $NombreAnimal = null, $PeligroExt = null, $Edad = null, $cuidadorCode = null, $zonaCode = null) {
        $this->IDAnimal = $IDAnimal;
        $this->Familia = $Familia;
        $this->NombreAnimal = $NombreAnimal;
        $this->PeligroExt = $PeligroExt;
        $this->Edad = $Edad;
        $this->CuidadorCode = $cuidadorCode;
        $this->ZonaCode = $zonaCode;
    }

    //2º getter y setter
    public function getID() {
        return $this->IDAnimal;
    }

    public function setID($IDAnimal) {
        $this->IDAnimal = $IDAnimal;
    }

    public function getName() {
        return $this->NombreAnimal;
    }

    public function setName($NombreAnimal) {
        $this->NombreAnimal = $NombreAnimal;
    }

    public function getZonaCode() {
        return $this->ZonaCode;
    }

    public function setZonaCode($ZonaCode) {
        $this->ZonaCode = $ZonaCode;
    }

    public function getPeligroExt() {
        return $this->PeligroExt;
    }

    public function setPeligroExt($PeligroExt) {
        $this->PeligroExt = $PeligroExt;
    }

    public function getFamilia() {
        return $this->Familia;
    }

    public function setFamilia($Familia) {
        $this->Familia = $Familia;
    }

    public function getEdad() {
        return $this->Edad;
    }

    public function setEdad($Edad) {
        $this->Edad = $Edad;
    }

    public function getCuidadorCode() {
        return $this->cuidadorCode;
    }

    public function setCuidadorCode($cuidadorCode) {
        $this->cuidadorCode = $cuidadorCode;
    }

        //3º getJson
    public function getJson() {
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' . $indice . '":"' . $valor . '",';
        }
        $r = substr($r, 0, -1);
        $r .='}';
        return $r;
    }

    //4º set genérico
    function setOld($valores, $inicio = 0) {
        $this->IDAnimal = $valores[0 + $inicio];
        $this->Familia = $valores[1 + $inicio];
        $this->NombreAnimal = $valores[2 + $inicio];
        $this->PeligroExt = $valores[3 + $inicio];
        $this->Edad = $valores[4 + $inicio];
        $this->ZonaCode = $valores[5 + $inicio];
        $this->cuidadorCode = $valores[6 + $inicio];
    }

    function set($valores, $inicio=0){
        $i = 0;
        foreach ($this as $indice => $valor) {
           $this->$indice = $valores[$i+$inicio];
           $i++;
        }
    }

    public function __toString() {
        $r = '';
        foreach ($this as $key => $valor) {
            $r .= "$valor ";
        }
        return $r;
    }

}
