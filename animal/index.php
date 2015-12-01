<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
var_dump($bd);
$gestor = new ManageAnimal($bd);
$page = Request::get("page");
if($page===null || $page ===""){
    $page = 1;
}

$order = Request::get("order");
$sort = Request::get("sort");
$orden = "$order $sort";
$trozoEnlace ="";
if(trim($orden)!=""){
    $trozoEnlace = "&order=$order&sort=$sort";
}
$animales = $gestor->getList($page, trim($orden));
$op = Request::get("op");
$r = Request::get("r");
//var_dump($bd->getError());
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Zoo Carlitos</title>
        <link rel="stylesheet" href="../estilo/estilos.css"/>
    </head>
    <body>
        <div id="fondocontenido"></div>
        <div id="cont">
        <h2><?php if($op!=null){
              echo "<h1>La operación $op ha dado como resultado $r</h1>";
        }?></h2>
        
        
        <h2><a href="viewInsert.php">Insertar Animal</a></h2>
        
        <table border="1">
            <thead>
                <tr>
                    <th>
                        ID 
                        <a href="?order=IDAnimal&sort=desc">&Del;</a> 
                        <a href="?order=IDAnimal&sort=asc">&Delta;</a></th>
                    <th>
                        Familia  
                        <a href="?order=Familia&sort=desc">&Del;</a> 
                        <a href="?order=Familia&sort=asc">&Delta;</a></th>
                    <th>
                        Nombre  
                        <a href="?order=NombreAnimal&sort=desc">&Del;</a> 
                        <a href="?order=NombreAnimal&sort=asc">&Delta;</a></th>
                    <th>
                        Peligro Extinción  
                        <a href="?order=PeligroExt&sort=desc">&Del;</a> 
                        <a href="?order=PeligroExt&sort=asc">&Delta;</a></th>
                   <th>
                        Edad  
                        <a href="?order=Edad&sort=desc">&Del;</a> 
                        <a href="?order=Edad&sort=asc">&Delta;</a></th>
                    <th>
                        Código Zona  
                        <a href="?order=ZonaCode&sort=desc">&Del;</a> 
                        <a href="?order=ZonaCode&sort=asc">&Delta;</a></th>
                    <th>
                        Código Cuidador  
                        <a href="?order=CuidadorCode&sort=desc">&Del;</a> 
                        <a href="?order=CuidadorCode&sort=asc">&Delta;</a></th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="8">
                        <a href="?page=1<?php $trozoEnlace ?>">Primero</a>
                        <a href="?page=<?php echo max(1, $page-1).$trozoEnlace?>">Anterior</a>
                        <a href="?page=<?php echo min($page+1, $pages).$trozoEnlace?>">Siguiente</a>
                        <a href="?page=<?php echo $pages.$trozoEnlace ?>">Ultimo</a>
                        <form method="post" style="display: inline;" id="fselect" action=".">
                            
                            <?php 
                                $array = ["10"=>"10", "50"=>"50", "100"=>"100"];
                                echo Util::getSelect("rpp", $array, 10, false)  
                            ?>
                            <input type="submit" value="ver" />
                        </form>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($animales as $indice => $animal) { ?>
                <tr>
                    <td><?= $animal->getID() ?></td>
                    <td><?= $animal->getFamilia() ?></td>
                    <td><?= $animal->getName() ?></td>
                    <td><?= $animal->getPeligroExt() ?></td>
                    <td><?= $animal->getEdad() ?></td>
                    <td><?= $animal->getZonaCode() ?></td>
                    <td><?= $animal->getCuidadorCode() ?></td>
                    <td>
                        <a class='borrar' href='phpdelete.php?ID=<?= $animal->getID() ?>'>borrar</a> 
                        <a href='viewedit.php?ID=<?= $animal->getID() ?>'>editar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="../index.php" class="atras">Volver</a>
        <script src="../js/scripts.js"></script>
        </div>
    </body>
</html>
<?php
$bd->close();
