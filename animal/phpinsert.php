<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageAnimal($bd);

$Familia = Request::post("Familia");
$NombreAnimal = Request::post("NombreAnimal");
$PeligroExt = Request::post("PeligroExt");
$Edad = Request::post("Edad");
$CuidadorCode = Request::post("CuidadorCode");
$ZonaCode = Request::post("ZonaCode");
$animal = new Animal(0, $Familia, $NombreAnimal, $PeligroExt, $Edad, $CuidadorCode, $ZonaCode);
$r = $gestor->insert($animal);
$bd->close();
//echo $r;
//var_dump($bd->getError());
header("Location:index.php?op=insert&r=$r");