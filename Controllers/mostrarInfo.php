<?php
    function cargarInmuebles() {
        $objConsulta = new Consultas();
        $conexion = $objConsulta -> consultarInmuebles();

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
                                
                                <a href=InmoEdit.php? id='.$f['id'].'" class="edit"></a>
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

        $objConxultas = new Consultas();
        $resul =$objConsultas -> consultarInmuebleEdit($id); 

        foreach($result as $f) {
            echo '
            <form action="" method = "POST">
            <input type="number" value="'.$f['id'].'" name="id"style="display:none">
            <div class="select">
            <select name="tipo">
                <option value=""'.$f['tipo'].'">'.$f['tipo'].'</option>
                <option value="Apartamento">Apartamento</option>
                <option value="Aparta Estudio">Aparta Estudio</option>
                <option value="Casa">Casa</option>
            </select>
        </div>
        <div class="select">
            <select name="categoria">
                <option value=""'.$f['categoria'].'">'.$f['categoria'].'>Selecci</option>
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
?>