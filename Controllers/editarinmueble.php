<?php
    require_once("../Models/Conexion.php");
    require_once("../Models/Consultas.php");

    $objConsulta = new Consultas();
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $metros = $_POST['tamano'];
    $ciudad = $_POST['ciudad'];
    $barrio = $_POST['barrio'];

    if(strlen($tipo) > 0 && strlen($categoria) > 0  && strlen($precio) > 0 && strlen($metros) > 0 && strlen($ciudad) > 0 && strlen($barrio) > 0) {

        $consulta = $objConsulta -> modificarInmueble($id, $tipo, $categoria, $precio, $metros, $ciudad, $barrio);

        echo '<script>alert("Inmueble modificado correctamente")</script>';
        echo '<script>location.href="../Views/inmoApartamentos.php"</script>';
    }else {
        echo '<script>alert("rellene todos los campos")</script>';
        echo '<script>location.href="../Views/inmoApartamentos.php"</script>';
    }


?>