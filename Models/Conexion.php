<?php
    class Conexion { 
        function get_conexion() {
            
            // creamos variables
            $user = "root";
            $password = "";
            $host = "localhost";
            $db = "imueble_ideal";

            // Cramos un objeto conexino PDO

            $conexion = new PDO("mysql:host=$host;dbname=$db;",$user,$password);

            // retornamos la conexion
            return $conexion;
        }
    }
?>