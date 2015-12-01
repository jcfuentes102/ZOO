<?php

class CountryLanguage {
    private $CountryCode, $Language, $IsOfficial, $Percentage;
    
    function __construct($CountryCode = null, $Language = null, 
            $IsOfficial = null, $Percentage = null) {
        $this->CountryCode = $CountryCode;
        $this->Language = $Language;
        $this->IsOfficial = $IsOfficial;
        $this->Percentage = $Percentage;
    }
    
    public function getZonaCode() {
        return $this->CountryCode;
    }

    public function getLanguage() {
        return $this->Language;
    }

    public function getIsOfficial() {
        return $this->IsOfficial;
    }

    public function getPercentage() {
        return $this->Percentage;
    }

    public function setZonaCode($CountryCode) {
        $this->CountryCode = $CountryCode;
    }

    public function setLanguage($Language) {
        $this->Language = $Language;
    }

    public function setIsOfficial($IsOfficial) {
        $this->IsOfficial = $IsOfficial;
    }

    public function setPercentage($Percentage) {
        $this->Percentage = $Percentage;
    }

    //3º getJson
    public function getJson(){
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' .$indice . '":"' .$valor. '",';
        }
        $r = substr($r, 0,-1);
        $r .='}';
        return $r;
    }
    
    //4º set genérico    
    function set($valores, $inicio=0){
        $i = 0;
        foreach ($this as $indice => $valor) {
           $this->$indice = $valoes[$i+$inicio];
           $i++;
        }
    }

}
