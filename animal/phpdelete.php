<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageAnimal($bd);
$IDAnimal = Request::get("ID");
$r = $gestor->delete($IDAnimal);
$bd->close();
header("Location:index.php?op=delete&r=$r");