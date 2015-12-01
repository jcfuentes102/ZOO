<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCuidador($bd);
$IDCuidador = Request::get("IDCuidador");
$cuidador = $gestor->get($IDCuidador);
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
            <h1 class="titulo">Editar cuidador</h1>
        <form action="phpedit.php" method="POST">
            ID Cuidador<sup>*</sup> <input required  type="text" name="IDCuidador" value="<?php echo $cuidador->getIDcuidador()?>" /><br /><br />
            Nombre Cuidador<sup>*</sup> <input required  type="text" name="NombreCuidador" value="<?php echo $cuidador->getNombreCuidador()?>" /><br /><br />
            Apellidos<sup>*</sup> <input required  list="apellidos" name="Apellido" value="<?php echo $cuidador->getApellido()?>" /><br /><br />
            Edad<sup>*</sup> <input required type="enum" name="Edad" value="<?php echo $cuidador->getEdad()?>"/><br/><br />
            Especialidad<sup>*</sup> <input required type="text" name="Especialidad" value="<?php echo $cuidador->getEspecialidad()?>"/><br/><br />

            <input type="hidden" name="pkCode" value="<?php echo $cuidador->getIDcuidador()?>" />
            <input type="submit" value="edicion"/>
        </form>
        <a href="index.php" class="atras">Volver</a>
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