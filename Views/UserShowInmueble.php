<?php 
    require_once("../Models/Conexion.php");
    require_once("../Models/Consultas.php");
    require_once("../Controllers/mostrarInfo.php");
    require_once("../Models/validarSesion.php");
    require_once("../Models/permisosUser.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Inmueble - Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <main class="show">
        <header>
            <h2>Consultar Inmueble</h2>
            <a href="UserDashboard.html" class="back"></a>
            <a href="index.html" class="close"></a>
        </header>
        <!-- <figure class="photo-preview">
            <img src="../imgs/inmueble-1.png" alt="">
        </figure> -->
        
        <?php
                cargarInmuebleDetalles();                     
            ?>
        
    </main>
</body>
</html>