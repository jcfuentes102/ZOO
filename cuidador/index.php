<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCuidador($bd);
$cuidadores = $gestor->getList();
$op = Request::get("op");
$r = Request::get("r");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Zoo Carlitos</title>
        <link rel="stylesheet" href="../estilo/estilos.css"/>
    </head>
    <body>
        <div id="fondocontenido3"></div>
        <div id="cont"><br />
        <h2><a href="viewInsert.php">Insertar Cuidador</a></h2>
        <?php
        if($op!=null){
            echo "<h1>La operación $op ha dado como resultado $r</h1>";
        }
        foreach ($cuidadores as $indice => $cuidador) {
            echo $cuidador;
            echo "<a class='borrar' href='phpdelete.php?IDuidador={$cuidador->getIDCuidador()}'>borrar</a> ";
            echo "<a class='borrar' href='phpdelete.php?f=&IDuidador={$cuidador->getIDCuidador()}'>Forzar borrado</a> ";
            echo "<a href='viewedit.php?IDuidador={$cuidador->getIDcuidador()}'>editar</a>";
            echo "<br>";
        }
        ?>
        <a href="../index.php" class="atras">Volver</a>
        <script src="../js/scripts.js"></script>
        </div>
        <div id="enlacesIndex">
            <a href="../animal/index.php">Animales</a>
            <a href="../zona/index.php">Zonas</a>
            <a href="cuidador/index.php">Cuidadores</a>
        </div>
        <h1 class="zoocarlitos">
            <span class="b1">z</span>
            <span class="b3">o</span>
            <span class="b2">O</span>
            &sbquo;
            <span class="b4">c</span>
            <span class="b5">A</span>
            <span class="b6">R</span>
            <span class="b7">l</span>
            <span class="b8">i</span>
            <span class="b9">T</span>
            <span class="b10">O</span>
            <span class="b11">s</span>
        </h1>
    </body>
</html>
<?php
$bd->close();
