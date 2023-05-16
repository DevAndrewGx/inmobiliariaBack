<?php 
    // si esta auntenticado podra acceder si no, no podra acceder
    session_start();
    // este archivo se debe incluir en cada interfaz de inmobiliria
    if(!isset($_SESSION['auntenticado'])) {

        echo '<script>alert("No has iniciado seccion para acceder, inicia secion para esta vista")</script>' ;
        echo "<script>location.href='../Views/login.php'</script>";
    }

    if($_SESSION['rol'] != "Usuario") {
        echo '<script>alert("Tu rol no tien permisos para acceder a esta vista, inicia secion para esta vista")</script>' ;
        echo "<script>location.href='../Views/login.php'</script>";
    }
?>