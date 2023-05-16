<?php
    require_once("../Models/Conexion.php");
    require_once("../Models/Consultas.php");


    $consultas = new Consultas();
    $id_inm = $_GET['id'];
    
    $messaje = $consultas -> eliminarInmuebles($id_inm);

    echo '<script>alert("Mueble Eliminado Exitosamente")</script>' ;
    echo "<script>location.href='../Views/inmoApartamentos.php'</script>";

    
?>