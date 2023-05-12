<?php
    class Consultas {
        public function registrarUser($identificacion, $nombres, $apellidos, $telefono, $email, $clave,$rol ) {
            $objConexion = new Conexion();
            $conexion = $objConexion ->get_conexion();

            // Validamos i el usuario se encuentra registrado a partir de un select y  un if para verificar informacion el la base de datos

            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :identificacion OR correo =:email";

            $statement = $conexion-> prepare ($consultar);

            $statement->bindParam(":identificacion", $identificacion);
            $statement->bindParam(":email",$email);
            
            $statement ->execute();

            // Creamos una variable de f(fetchArray) devuelve un array Asociativo

            // Siempre que tenemos una flecha siempre va ser una funcion o una subrutina

            // La variable f solo exitara si hay algo en la tabla users ya sea email o contraseña
            $f = $statement ->fetch();
            if($f) {
                echo '<script>alert("La informacion del usuario que intenta registrar ya esta almacenada")</script>' ;
                echo "<script>location.href='../Views/login.php'</script>";
            }else {
                //cuando no hay ningun usuario registrado se crea uno nuevo en el else con un insert
                $objConexion = new Conexion();
                $conexion = $objConexion ->get_conexion();


                $insertar = "INSERT INTO usuarios (id_usuario, nombres, apellidos, telefono, correo, clave, rol) VALUES (:identificacion, :nombres, :apellidos, :telefono, :email, :password, :rol)";

                $statement = $conexion -> prepare($insertar);

                $statement->bindParam(":identificacion",$identificacion);
                $statement->bindParam(":nombres",$nombres);
                $statement->bindParam(":apellidos",$apellidos);
                $statement->bindParam(":telefono",$telefono);
                $statement->bindParam(":email",$email);
                $statement->bindParam(":password",$clave);
                $statement->bindParam(":rol",$rol);

                $statement->execute();
                
                

            }
            
           


        }
    }
?>