<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageZona($bd);
$zona = new Zona();
$zona->read();

//$arrayCountry = $country->getArray();
//$arrayCountryLeer = array();
//
//foreach ($arrayCountry as $key => $value) {
//    $arrayCountryLeer[] = Request::post($key);
//}
//
//$country->set($arrayCountryLeer);
//$country->setCapital(null);

$r = $gestor->insert($zona);
$bd->close();

echo $r;
var_dump($bd->getError());

header("Location:index.php?op=insert&r=$r");