<?php

class ManageCuidador {
    private $bd = null;
    private $tabla = "Cuidador";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
     function getList(){
         $this->bd->select($this->tabla, "*", "1=1", array(), "NombreCuidador, IDCuidador");
         $r=array();
         while($fila =$this->bd->getRow()){
             $cuidador = new Cuidador();
             $cuidador->set($fila);
             $r[]=$cuidador;
         }
         return $r;
    }
    
    function get($IDCuidador){
        $parametros = array();
        $parametros['IDCuidador'] = $IDCuidador;
        $this->bd->select($this->tabla, "*", "IDCuidador=:IDCuidador", $parametros);
        $fila=$this->bd->getRow();
        $cuidador = new Cuidador();
        $cuidador->set($fila);
        return $cuidador;
    }
    
    function delete($IDCuidador){
        $parametros = array();
        $parametros['IDCuidador'] = $IDCuidador;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function forzarDelete($IDCuidador){
        $parametros = array();
        $parametros['CuidadorCode'] = $IDCuidador;
        $gestor = new ManageCuidador($this->bd);
        $gestor->deleteZonas($parametros);
        $this->bd->delete("countrylanguage", $parametros); //se deberia de hacer a traves de la clase
        $parametros = array();
        $parametros['IDCuidador'] = $IDCuidador;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Cuidador $IDCuidador){
        return $this->delete($IDCuidador->getID());
    }
    
    function set(Cuidador $IDCuidador, $pkCode){
        $parametros = $IDCuidador->getArray();
        $parametrosWhere = array();
        $parametrosWhere["IDCuidador"] = $pkCode;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
    
    function insert(Cuidador $IDCuidador){
        $parametros = $IDCuidador->getArray();
        return $this->bd->insert($this->tabla, $parametros, false);
    }
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "IDCuidador, NombreCuidador", array(), "Especialidad");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
}

?>
