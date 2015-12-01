<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageZona($bd);
$IDZona = Request::get("IDZona");
$f = Request::get("f");
if($f===null){
    $r = $gestor->delete($IDZona); 
}else{
    $r = $gestor->forzarDelete($IDZona);
}
$bd->close();
header("Location:index.php?op=delete&r=$r");