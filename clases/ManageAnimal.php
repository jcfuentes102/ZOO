<?php


class ManageAnimal {
    
    private $bd = null;
    private $tabla = "animal";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
        //var_dump($this->bd);
    }
    
    function get($IDAnimal){
        //devuelve un objeto de la clase animal
        $parametros = array();
        $parametros['IDAnimal'] = $IDAnimal;
        $this->bd->select($this->tabla, "*", "id=:IDAnimal", $parametros);
        $fila=$this->bd->getRow();
        $animal = new Animal();
        $animal->set($fila);
        return $animal;
    }
    
    function delete($IDAnimal){
        $parametros = array();
        $parametros['IDAnimal'] = $IDAnimal;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    
    function deleteAnimales($parametros){
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Animal $animal){
        return $this->delete($animal->getID());
    }
    
    function set(Animal $animal){
        //Update de todos los campos menos el id, el id se usara como el where para el update numero de filas modificadas
        $parametrosSet=array();
        $parametrosSet['Familia']=$animal->getFamilia();
        $parametrosSet['NombreAnimal']=$animal->getName();
        $parametrosSet['PeligroExt']=$animal->getPeligroExt();
        $parametrosSet['Edad']=$animal->getEdad();
        $parametrosSet['ZonaCode']=$animal->getZonaCode();
        $parametrosSet['cuidadorCode']=$animal->getCuidadorCode();
        
        $parametrosWhere = array();
        $parametrosWhere['IDAnimal'] = $animal->getID();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
        
    }
    
    function insert(Animal $animal){
        //Se pasa un objeto city y se inserta, se devuelve el id del elemento con el que se ha insertado
        $parametrosSet=array();
        $parametrosSet['Familia']=$animal->getFamilia();
        $parametrosSet['NombreAnimal']=$animal->getName();
        $parametrosSet['PeligroExt']=$animal->getPeligroExt();
        $parametrosSet['Edad']=$animal->getEdad();
        $parametrosSet['ZonaCode']=$animal->getZonaCode();
        $parametrosSet['cuidadorCode']=$animal->getCuidadorCode();
        
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
    
    function getList($pagina=1, $orden="", $nrpp=Constant::NRPP){
        
        $ordenPredeterminado = "$orden, NombreAnimal, ZonaCode, IDAnimal";
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "NombreAnimal, ZonaCode, IDAnimal";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $animal = new Animal();
             $animal->set($fila);
             $r[]=$animal;
         }
         return $r;
    }
    
     function getValuesSelect(){
        $this->bd->query($this->tabla, "IDAnimal, NombreAnimal", array(), "NombreAnimal");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
    function count($condicion="1 = 1", $parametros = array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }

}
