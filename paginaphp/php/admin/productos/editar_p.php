<?php
    session_start();

    //RECUERDA CAMBIAR "base_de_datos_prueba" POR EL NOMBRE DE TU BASE DE DATOS LOCAL EN MYSQL
    $mysqli = new mysqli("localhost","root","","base_de_datos_prueba");

    $_id       = $_POST['id']; //Id del Usuario a Editar
    $_nombre   = $_POST['nombre']; //Nuevo Nombre de Nuevo Usuario
    $_precio   = $_POST['precio']; //Nuevo Apellido de Nuevo Usuario
    $_empresa  = $_POST['empresa']; //Nueva Cedula de Nuevo Usuario


    if (isset($_nombre) == null OR isset($_precio) == null OR
    isset($_empresa) == null) {
            //En caso de que no
            echo '<script>alert("Debe rellenar todos los campos"); window.location.href = "productos.php";</script>';
    } else {
            //En caso de que si
            $edicion = "UPDATE productos SET
            nombre  = '$_nombre',
            empresa  = '$_empresa',
            precio   = '$_precio'
            
            WHERE id = $_id
            ";

        $resultado = $mysqli->query($edicion); //Insertar la insercion dentro del MySQL

        //Resultados, Si se guardo exitosamente o no
        if ($resultado) {
            echo '<script>alert("Producto actualizado con exito"); window.location.href = "productos.php";</script>'; //Exito: Regresar a la pestaña de agregar usuarios
        } else {
            echo "Hubo un error al intentar guardar los datos"; //Fallo: Informar del fallo
        }

    }

    //Cierra la conexion MySQL
    $mysqli->close();

?>