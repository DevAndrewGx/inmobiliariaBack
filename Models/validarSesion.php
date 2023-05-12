<?php

    
    class Sesion {
        public function iniciarSecion($email, $clave) {
            $objConexion = new Conexion();
            $conexion = $objConexion ->get_conexion();

            $consultar = "SELECT * FROM usuarios WHERE correo=:email";
            $statement = $conexion->prepare($consultar);

            $statement -> bindParam(":email",$email);

            $statement->execute();


            // lo que hicimos anteriormente es para validar si el email del usuario esta registrado en la base de datos

            if($f=$statement->fetch()) {
                //validamos la clave ingresada con la clave de la DB
                if($clave == $f['clave']) {

                    session_start();
                    // las variables de secion son para el archivo de seguridad de rutas o de permisos de rutas...
                    $_SESSION['id'] = $f['id_usuario'];
                    $_SESSION['rol'] = $f['rol']; 
                    $_SESSION['auntenticado'] = "SI";

                    if($f('rol') == "Usuario") {
                        echo '<script>alert("Bienvenido Usuario :)")</script>' ;
                        echo "<script>location.href='../Views/login.php'</script>"; 
                    }else { 
                        echo '<script>alert("Bienvenido Inmobiliaria")</script>' ;
                        echo "<script>location.href='../Views/login.php'</script>"; 
                    }
                }else {
                    echo '<script>alert("La clave es incorrecta")</script>' ;
                    echo "<script>location.href='../Views/login.php'</script>";   
                }
            }else {
                echo '<script>alert("El email no se encuentra registrado en el sistema, verifique los datos")</script>' ;
                echo "<script>location.href='../Views/login.php'</script>";
            }
        }
    }
?>