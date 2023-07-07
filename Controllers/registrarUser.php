<?php 
    require_once("../Models/Conexion.php");
    require_once("../Models/Consultas.php");

    $identidicacion = $_POST["identificacion"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["email"];
    $clave = $_POST["password"];
    $rol = $_POST["rol"];

    if(strlen($identidicacion > 0) && strlen($nombres > 0) && strlen($apellidos > 0) &&  strlen($telefono > 0) && strlen($correo > 0) && strlen($clave > 0) && strlen($rol > 0)) {
        // para encriptar  se usa md5
        $claveMD = md5($clave);
       

        $consultas = new Consultas();
        $mensaje = $consultas -> registrarUser($identidicacion, $nombres, $apellidos, $telefono, $correo, $claveMD, $rol);

        echo '<script>alert("Registro exitoso")</script>' ;
        echo "<script>location.href='../Views/register.php'</script>";
        

    }else  {
        echo '<script>alert("Digita todos los campos")</script>' ;
        echo "<script>location.href='../Views/register.php'</script>";
    }
?>