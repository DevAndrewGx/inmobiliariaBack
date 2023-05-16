<?php 
    require_once("../Models/Conexion.php");
    require_once("../Models/Consultas.php");
    require_once("../Controllers/mostrarInfo.php");
    require_once("../Models/validarSesion.php");
    require_once("../Models/permisoInmo.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Solicitud || Tu Inmueble Ya</title>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <main class="show">
        <header>
            <h2>Consultar Solicitud</h2>
            <a href="InmoSolicitudes.html" class="back"></a>
            <a href="../Controllers/cerrarSecion.php" class="close"></a>
        </header>
       
       
        <?php
                consultarSolicitudesDetalles();
            ?>

    </main>
</body>

</html>