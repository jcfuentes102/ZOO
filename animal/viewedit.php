<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageAnimal($bd);
$IDAnimal = Request::get("IDAnimal");
$animal = $gestor->get($IDAnimal);
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
        <form action="phpedit.php" method="POST"><br/>
            <h1 class="titulo">Editar animal</h1>
           Nombre: <input type="text" name="NombreAnimal" value="<?php echo $animal->getName(); ?>" /><br/><br/>
           Familia: <input type="text" name="Familia" value="<?php echo $animal->getFamilia(); ?>" /><br/><br/>
           Peligro Extinción(S ó N):<input type="Text" name="PeligroExt" value="<?php echo $animal->getPeligroExt(); ?>" /><br/><br/>
           Edad: <input type="number" name="Edad" value="<?php echo $animal->getEdad(); ?>" /><br/><br/>
           Zona: <?php echo Util::getSelect("ZonaCode", $gestorZona->getValuesSelect());?><br/><br/>
           Cuidador: <?php echo Util::getSelect("CuidadorCode", $gestorCuidador->getValuesSelect());?><br/><br/>
           <input type="hidden" name="pkID" value="<?php echo $animal->getID(); ?>" /><br/><br/>

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