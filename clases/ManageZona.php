<?php


class ManageZona {
    private $bd = null;
    private $tabla = "Zona";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
     function getList(){
         $this->bd->select($this->tabla, "*", "1=1", array(), "NombreZona, IDZona");
         $r=array();
         while($fila =$this->bd->getRow()){
             $zona = new Zona();
             $zona->set($fila);
             $r[]=$zona;
         }
         return $r;
    }
    
    function get($IDZona){
        $parametros = array();
        $parametros['IDZona'] = $IDZona;
        $this->bd->select($this->tabla, "*", "IDZona=:IDZona", $parametros);
        $fila=$this->bd->getRow();
        $zona = new Zona();
        $zona->set($fila);
        return $zona;
    }
    
    function delete($IDZona){
        $parametros = array();
        $parametros['IDZona'] = $IDZona;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function forzarDelete($IDZona){
        $parametros = array();
        $parametros['ZonaCode'] = $IDZona;
        $gestor = new ManageZona($this->bd);
        $gestor->deleteZonas($parametros);
        $this->bd->delete("countrylanguage", $parametros); //se deberia de hacer a traves de la clase
        $parametros = array();
        $parametros['IDZona'] = $IDZona;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Zona $zona){
        return $this->delete($zona->getID());
    }
    
    function set(Zona $zona, $pkCode){
        $parametros = $zona->getArray();
        $parametrosWhere = array();
        $parametrosWhere["IDZona"] = $pkCode;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
    
    function insert(Zona $zona){
        $parametros = $zona->getArray();
        return $this->bd->insert($this->tabla, $parametros, false);
    }
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "IDZona, NombreZona", array(), "Tipo");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
}
