<?php
    class Consultas {
        public function registrarUser($identificacion, $nombres, $apellidos, $telefono, $email, $clave,$rol ) {
            $objConexion = new Conexion();
            $conexion = $objConexion ->get_conexion();

            // Validamos i el usuario se encuentra registrado a partir de un select y  un if para verificar informacion el la base de datos

            $consultar = "SELECT * FROM usuarios WHERE id = :identificacion OR correo =:email";

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


                $insertar = "INSERT INTO usuarios (id, nombres, apellidos, telefono, correo, clave, rol) VALUES (:identificacion, :nombres, :apellidos, :telefono, :email, :password, :rol)";

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

        public function registrarInmueble($tipo, $categoria, $precio, $metros, $ciudad, $barrio, $foto) {

            $objConexion = new Conexion();
            $conexion = $objConexion ->get_conexion();

            $insertar = "INSERT INTO inmuebles (tipo, categoria, precio, tamano, ciudad, barrio, foto) VALUES(:tipo, :categoria, :precio, :tamano, :ciudad, :barrio, :foto)";

            $statement = $conexion -> prepare($insertar);

            $statement->bindParam(":tipo", $tipo);
            $statement->bindParam(":categoria", $categoria);
            $statement->bindParam(":precio", $precio);
            $statement->bindParam(":tamano", $metros);
            $statement->bindParam(":ciudad", $ciudad);
            $statement->bindParam(":barrio", $barrio);
            $statement->bindParam(":foto", $foto);

            $statement -> execute();
        }

        public function consultarInmuebles() {
            $f = null;

            $objConexion = new Conexion();
            $conexion = $objConexion ->get_conexion();


            $consultar = "SELECT * FROM inmuebles ORDER BY id DESC";

            $statement = $conexion -> prepare($consultar);

            $statement -> execute();

            while($resultado =  $statement->fetch()) {
                $f[] = $resultado;
            }

            return $f;
        }

        public function eliminarInmuebles($id) {
            $objConexion = new Conexion();
            $conexion = $objConexion -> get_conexion();


            $eliminar = "DELETE FROM inmuebles WHERE id=:id";

            $statement = $conexion -> prepare($eliminar);

            $statement -> bindParam(":id",$id);

            $statement -> execute();

            echo '<script>alert("Inmueble eliminado")</script>' ;
            echo "<script>location.href='../Views/inmoApartamentos.php'</script>";
        }
    

        public function consultarInmuebleEdit($id) {

            $objConexion = new Conexion();
            $conexion = $objConexion -> get_conexion();

            $consultar = "SELECT * FROM inmuebles WHERE id=:id ";
            $statement = $conexion -> prepare($consultar);
            $statement -> bindParam(":id",$id);
            $statement -> execute();

            while($resultado =  $statement->fetch()) {
                $f[] = $resultado;
            }



           return $f;
        }

        public function modificarInmueble($id, $tipo, $categoria, $precio, $metros, $ciudad, $barrio) { 
            $objConexion =  new Conexion();
            $conexion = $objConexion -> get_conexion();


            $actualizar = "UPDATE inmuebles SET tipo=:tipo, categoria=:categoria, precio=:precio, tamano=:metros, ciudad=:ciudad, barrio=:barrio WHERE id=:id";

            $statement = $conexion ->prepare($actualizar);

            $statement-> bindParam(":id",$id);
            $statement-> bindParam(":tipo",$tipo);
            $statement-> bindParam(":categoria",$categoria);
            $statement-> bindParam(":precio",$precio);
            $statement-> bindParam(":tamano",$tamano);
            $statement-> bindParam(":ciudad",$ciudad);
            $statement-> bindParam(":ciudad",$ciudad);
            
            $statement ->execute();

            

        }
    }

?>