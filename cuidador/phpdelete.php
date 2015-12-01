<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCuidador($bd);
$IDCuidador = Request::get("IDCuidador");
$f = Request::get("f");
if($f===null){
    $r = $gestor->delete($IDCuidador); 
}else{
    $r = $gestor->forzarDelete($IDCuidador);
}
$bd->close();
header("Location:index.php?op=delete&r=$r");