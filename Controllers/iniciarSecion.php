<?php 
     require_once("../Models/Conexion.php");
     require_once("../Models/validarSesion.php");

    $email = $_POST['email'];
    $clave = md5($_POST['password']);
    $objSesion = new Sesion();

    $result = $objSesion->iniciarSecion($email, $clave);
?>