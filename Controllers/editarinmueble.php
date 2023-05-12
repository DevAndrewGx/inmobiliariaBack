<?php
    require_once("../Models/Consultas.php");

    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $metros = $_POST['metros'];
    $ciudad = $_POST['ciudad'];
    $categoria = $_POST['barrio'];

    if(strlen($tipo) > 0 && strlen($categoria) > 0  && strlen($tipo) > 0)


?>