<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorZona = new ManageZona($bd);
$gestorCuidador = new ManageCuidador($bd);
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
        <form action="phpinsert.php" method="POST"><br/><br/>
            <h1 class="titulo">Insertar un nuevo animal al ZOO!</h1>
            Nombre: <input type="text" name="NombreAnimal" value="" /><br/><br/>
            Familia: <input type="text" name="Familia" value="" /><br/><br/>
            Peligro Extinción: Sí<input type="radio" name="PeligroExt" value="S" />No<input type="radio" name="PeligroExt" value="N" /><br/><br/>
            Edad: <input type="number" name="Edad" value=""/><br><br/>
            Cuidador: <?php echo Util::getSelect("CuidadorCode", $gestorCuidador->getValuesSelect());?><br/><br/>
            Zona Destinado: <?php echo Util::getSelect("ZonaCode", $gestorZona->getValuesSelect());?><br/><br/>
            <input type="submit" value="edicion"/>
        </form>
        <a href="index.php" class="atras">Cancelar y volver atrás</a>
        </div>
        <div id="enlacesIndex">
            <a href="index.php">Animales</a>
            <a href="../zona/index.php">Zonas</a>
            <a href="../cuidador/index.php">Cuidadores</a>
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