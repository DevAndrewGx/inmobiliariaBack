<?php  
    require_once("../Models/Conexion.php");
    require_once("../Models/Consultas.php");
    require_once("../Models/validarSesion.php");

    $id_inm = $_GET['id'];
    // utilizamos seccion_start para traer el id del usuario que intenta hacer una cita

    session_start();
    $id_user = $_SESSION['id'];
    $fecha = date("Y-m-d");

    $objConsultas = new Consultas();
    $result = $objConsultas -> registrarSolicitud($id_inm, $id_user,$fecha);

    echo '<script>alert("Registro de solicitud exitoso")</script>' ;
    echo "<script>location.href='../Views/UserDashboard.php'</script>";

?>