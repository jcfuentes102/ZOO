<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCuidador($bd);
$cuidador = new Cuidador();
$cuidador->read();

$r = $gestor->insert($cuidador);
$bd->close();

echo $r;
var_dump($bd->getError());

header("Location:index.php?op=insert&r=$r");