<?php
    require_once("../Models/Consultas.php");

    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $metros = $_POST['metros'];
    $ciudad = $_POST['ciudad'];
    $barrio = $_POST['barrio'];

    if(strlen($tipo)>0 && strlen($categoria)>0 &&  strlen($precio)>0 &&  strlen($metros)>0 &&  strlen($ciudad)>0 && strlen($barrio)>0) {
        // En esta variable definimos la ruta a guardar en la base de datows
        $foto = "../upload/".$_FILES['foto']['name'];

        // Este es el codigo para mover la imagen en la ruta definida en la variable foto
        $resultado = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);


        $objConsultas = new Consultas();
        $result = $objConsultas -> registrarInmueble($tipo, $categoria, $precio, $metros, $ciudad, $barrio, $foto);
    }else {
        
    }

    
?>