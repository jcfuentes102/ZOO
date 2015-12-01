<?php

class Cuidador {
    private $IDcuidador, $NombreCuidador, $Apellido, $Edad, $Especialidad;
    
    function __construct($IDcuidador = null, $NombreCuidador = null, $Apellido = null, $Edad = null, $Especialidad = null) {
        $this->IDcuidador = $IDcuidador;
        $this->NombreCuidador = $NombreCuidador;
        $this->Apellido = $Apellido;
        $this->Edad = $Edad;
        $this->Especialidad = $Especialidad;
    }
    public function getIDcuidador() {
        return $this->IDcuidador;
    }

    public function setIDcuidador($IDcuidador) {
        $this->IDcuidador = $IDcuidador;
    }

    public function getNombreCuidador() {
        return $this->NombreCuidador;
    }

    public function setNombreCuidador($NombreCuidador) {
        $this->NombreCuidador = $NombreCuidador;
    }

    public function getApellido() {
        return $this->Apellido;
    }

    public function setApellido($Apellido) {
        $this->Apellido = $Apellido;
    }

    public function getEdad() {
        return $this->Edad;
    }

    public function setEdad($Edad) {
        $this->Edad = $Edad;
    }

    public function getEspecialidad() {
        return $this->Especialidad;
    }

    public function setEspecialidad($Especialidad) {
        $this->Especialidad = $Especialidad;
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
?>
