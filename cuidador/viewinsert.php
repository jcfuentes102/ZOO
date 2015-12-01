<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorZona = new ManageCuidador($bd);
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
        <div id="cont"><br /><br />
        <h1 class="titulo">Insertar un nuevo cuidador al ZOO!</h1>
        <form action="phpinsert.php" method="POST">
            ID Cuidador<sup>*</sup> <input required  type="text" name="IDCuidador" value="" /><br /><br />
            Nombre Cuidador<sup>*</sup> <input required  type="text" name="NombreCuidador" value="" /><br /><br />
            Apellidos<sup>*</sup> <input required  list="apellidos" name="Apellido" value="" /><br /><br />
            Edad<sup>*</sup> <input required type="enum" name="Edad" value=""/><br/><br />
            Especialidad<sup>*</sup> <input required type="text" name="Especialidad" value=""/><br/><br />

            <input type="submit" value="edicion"/>
            <a href="index.php" class="atras">Volver</a>
        </form>
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