<?php

class Zona {
    private $IDZona,$NombreZona, $Tipo;
    
        function __construct($Code = null, $NombreZona = null, $Tipo = null) {
        $this->IDZona = $Code;
        $this->NombreZona = $NombreZona;
        $this->Tipo = $Tipo;
    }
    
    public function getIDZona() {
        return $this->IDZona;
    }

    public function setIDZona($IDZona) {
        $this->IDZona = $IDZona;
    }

    public function getNombreZona() {
        return $this->NombreZona;
    }

    public function setNombreZona($NombreZona) {
        $this->NombreZona = $NombreZona;
    }

    public function getTipo() {
        return $this->Tipo;
    }

    public function setTipo($Tipo) {
        $this->Tipo = $Tipo;
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
           $this->$indice = $valores[$i+$inicio];
           $i++;
        }
    }
    
    public function __toString() {
        $r ='';
        foreach ($this as $key => $valor) { 
            $r .= "$valor ";
        }
        return $r;
    }
    
    public function getArray($valores = true){
        $array = array();
        foreach ($this as $key => $valor) {
            if($valores === true){
                $array[$key] = $valor;
            }else{
                $array[$key]=null;
            }
        }
        return $array;
    }
    
    function read(){
        foreach ($this as $key => $valor) {
            $this->$key = Request::req($key);
        }
    }
    
}
