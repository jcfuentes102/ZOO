<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageAnimal($bd);
/* ¿Quien es el usuario que intenta insertar? / Validación de datos */
$IDAnimal = Request::post("pkID");
$Familia = Request::post("Familia");
$NombreAnimal = Request::post("NombreAnimal");
$PeligroExt = Request::post("PeligroExt");
$Edad = Request::post("Edad");
$CuidadorCode = Request::post("CuidadorCode");
$ZonaCode = Request::post("ZonaCode");
$animal = new Animal($IDAnimal, $Familia, $NombreAnimal, $PeligroExt, $Edad, $CuidadorCode, $ZonaCode);
$r = $gestor->set($animal);
$bd->close();
//echo $r;
//var_dump($bd->getError());
header("Location:index.php?op=edit&r=$r");