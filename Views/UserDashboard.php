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
    <title>Dashboard User || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <main class="dashboard">
        <header>
            <h2>Inmuebles Disponibles</h2>
            
            <a href="../Controllers/cerrarSecion.php" class="close"></a>
        </header>
        <div class="contCards">
            <?php
                cargarInmueblesUser();
            ?>          
        </div>

    </main>
</body>

</html>