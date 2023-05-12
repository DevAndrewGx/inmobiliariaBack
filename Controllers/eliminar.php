<?php
    
    require_once("../Models/Consultas.php");


    $consultas = new Consultas();
    $id_inm = $_GET['id'];
    
    $messaje = $consultas -> eliminarInmueble($id_inm);
    
?>