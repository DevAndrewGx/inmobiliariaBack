<?php
    function cargarInmuebles() {
        $objConsulta = new Consultas();
        $result = $objConsulta -> consultarInmuebles();

        if(!isset($result)) {
            // echo '<h2>No existen inmuebles registrados</h2>';

            echo '
                <tr>
                    <td style="text-align:center">No hay inmuebles registrados</td>
                </tr>

            ';
        }else {
            foreach($result as $f) {
                
                echo '
                    <tr>
                        <td>
                            <figure class="photo">
                                <img src="'.$f['foto'].'" alt="">
                            </figure>
                            <div class="info">
                                <h3>'.$f['tipo'].'</h3>
                                <h4>$'.$f['precio'].'</h4>
                                <p>'.$f['ciudad'].'/'.$f['barrio'].'</p>
                            </div>
                            <div class="controls">
                                
                                <a href="InmoEdit.php? id='.$f['id'].'" class="edit"></a>
                                <a href="../Controllers/eliminarInmueble.php? id='.$f['id'].'" class="delete"></a>
                            </div>
                        </td>
                    </tr>
                ';
            }
        }
    }

    // esta funcion solo es para atraer la informacion del inmeuble del forulario
    function cargarInmuebleEdit() {
        // Creamos la variable que aterriza o captura el id del inmueble enviado por metodo get

        $id = $_GET['id'];

        $objConsultas = new Consultas();
        $result =$objConsultas -> consultarInmuebleEdit($id); 

        foreach($result as $f) {
            echo '
            <form action="../Controllers/editarinmueble.php" method = "POST">
            <input type="number" value="'.$f['id'].'" name="id"style="display:none">
            <div class="select">
            <select name="tipo">
                <option value="'.$f['tipo'].'">'.$f['tipo'].'</option>
                <option value="Apartamento">Apartamento</option>
                <option value="Aparta Estudio">Aparta Estudio</option>
                <option value="Casa">Casa</option>
            </select>
        </div>
        <div class="select">
            <select name="categoria">
                <option value=""'.$f['categoria'].'">'.$f['categoria'].'</option>
                <option value="Arriendo">Arriendo</option>
                <option value="Venta">Venta</option>
            </select>
        </div>
        <input type="number" name="precio" value="'.$f['precio'].'" placeholder="Precio...">
        <input type="number" name="tamano" value="'.$f['tamano'].'" placeholder="Tamaño...">
        <input type="text" name="ciudad" value="'.$f['ciudad'].'" placeholder="Ciudad...">
        <input type="text" name="barrio" value="'.$f['barrio'].'" placeholder="Localidad/Barrio...">
        
        <button type="submit" class="btn-home">Modificar</button>
        </form>    
            
            
            ';
        }

    }

    function cargarInmueblesUser() {
        $objConsulta = new Consultas();
        $result = $objConsulta -> consultarInmuebles();

        if(!isset($result)) {
            echo '<h2>No existen inmuebles registrados</h2>';

            echo '
                <tr>
                    <td style="text-align:center">No hay inmuebles registrados</td>
                </tr>

            ';
        }else {
            foreach($result as $f) {
                
                echo '
                <div class="card-inmueble">
                <img src="'.$f['foto'].'" alt="">
                <div class="info-card">
                    <h4>Valor de '.$f['categoria'].':</h4>
                    <h2>$'.$f['precio'].'</h2>
                    <p>'.$f['tipo'].'- '.$f['tamano'].'</p>
                    <p class="direccion">'.$f['ciudad'].'/'.$f['barrio'].'</p>
                    <a href="UserShowInmueble.php?id='.$f['id'].'">Ver Más</a>
                </div>
            </div>
                ';
            }
        }
    }
    
    function cargarInmuebleDetalles() {
        $objConsulta = new Consultas();
        $id = $_GET['id'];
        $result = $objConsulta -> consultarInmueblesUser($id);

        if(!isset($result)) {
            ;

            echo '
                <tr>
                    <td style="text-align:center">No hay inmuebles registrados</td>
                </tr>

            ';
        }else {
            foreach($result as $f) {
                
                echo '
                <figure class="photo-preview">
                        <img src="'.$f['foto'].'" alt="">
                    </figure>
                <div class="cont-details">
                    <div>
                    <article class="info-name"><p>'.$f['tipo'].'</p></article>
                    <article class="info-category"><p>'.$f['categoria'].'</p></article>
                    <article class="info-precio"><p>$'.$f['precio'].'</p></article>
                    <article class="info-direccion"><p>'.$f['ciudad'].'/'.$f['barrio'].'</p></article>
                    <article class="info-tamano"><p>'.$f['tamano'].'</p></article>
    
                    <a href="../Controllers/registrarSolicitud.php?id='.$f['id'].'" class="btn-home">Solictar cita</a>
                </div>
                </div>
                
           
                ';
            }
        }
    }

    function consultarSolicitudesDetalles() {
        $objConsulta = new Consultas();
        $id = $_GET['id'];
        $result = $objConsulta -> consultarSolicitudDetalle($id);

        
        if(!isset($result)) {
            ;

            echo '
                <tr>
                    <td style="text-align:center">No hay solicitudes registradass</td>
                </tr>

            ';
        }else {
            foreach($result as $f) {
                
                echo '
                <figure class="photo-preview">
                    <img src="'.$f['foto'].'" alt="">
                </figure>
                 <div class="cont-details">
                    <div>
                        <article class="info-name">
                            <p>'.$f['tipo'].'</p>
                        </article>
                        <article class="info-category">
                            <p>'.$f['categoria'].'</p>
                        </article>
                        <article class="info-precio">
                            <p>$'.$f['precio'].'</p>
                        </article>
                        <article class="info-direccion">
                            <p>'.$f['ciudad'].'/'.$f['barrio'].'</p>
                        </article>
                        <hr>
                        <br>
                        <article class="info-fecha">
                            <p>'.$f['fecha'].'</p>
                        </article>
                        <article class="info-usuario">
                            <p>'.$f['nombres'].'</p>
                        </article>
                        <article class="info-telefono">
                            <p>'.$f['telefono'].'</p>
                        </article>
                        <article class="info-correo">
                            <p>'.$f['correo'].'</p>
                        </article>
                    </div>
                </div>
            
                
                ';
            }
        }
    }
    function consultarSolicitud() {
        $objConsulta = new Consultas();
        $result = $objConsulta -> consultarDetalle();

        if(!isset($result)) {
            ;

            echo '
                <tr>
                    <td style="text-align:center">No hay solicitudes registradas</td>
                </tr>

            ';
        }else {
            foreach($result as $f) {
                
                echo '
                <tr>
                    <td>
                        <figure class="photo">
                            <img src="'.$f['foto'].'" alt="">
                        </figure>
                        <div class="info">
                            <h3>'.$f['tipo'].'</h3>                        
                            <p>'.$f['ciudad'].'/'.$f['barrio'].'</p>
                            <p>'.$f['nombres'].'</p>
                        </div>
                        <div class="controls">
                            <a href="InmoShowSolicitud.php?id='.$f['id_sol'].'" class="show"></a>
                        </div>
                    </td>
                </tr>
           
                ';
            }
        }
    }
?>