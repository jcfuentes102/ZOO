<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageZona($bd);
$IDZona = Request::get("IDZona");
$zona = $gestor->get($IDZona);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Zoo Carlitos</title>
        <link rel="stylesheet" href="../estilo/estilos.css"/>
    </head>
    <body>
                <div id="fondocontenido2"></div>
        <div id="cont"><br />
       <h1 class="titulo">Editar Zona </h1>
        <form action="phpedit.php" method="POST">
            ID Zona<sup>*</sup> <input required  type="text" name="IDZona" value="<?php echo $zona->getIDZona()?>" /><br /><br />
            Nombre Zona<sup>*</sup> <input required  type="text" name="NombreZona" value="<?php echo $zona->getNombreZona()?>" /><br /><br />
            Tipo<sup>*</sup> <input required  list="continentes" name="Tipo" value="<?php echo $zona->getTipo()?>" /><br /><br />

            <input type="hidden" name="pkCode" value="<?php echo $zona->getIDZona()?>" />
            <input type="submit" value="edicion"/>
            
        </form>
       <a href="index.php" class="atras">Volver</a>
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