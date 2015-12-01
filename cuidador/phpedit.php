<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCuidador($bd);
$zona = new Cuidador();
$zona->read();
$pkCode = Request::post("pkCode");
$r = $gestor->set($zona, $pkCode);
$bd->close();

echo $r;
var_dump($bd->getError());

header("Location:index.php?op=edit&r=$r");