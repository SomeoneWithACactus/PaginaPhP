<?php
    session_start();

    //RECUERDA CAMBIAR "base_de_datos_prueba" POR EL NOMBRE DE TU BASE DE DATOS LOCAL EN MYSQL
    $mysqli = new mysqli("localhost","root","","base_de_datos_prueba");

    $_nombre   = $_POST['nombre']; //Nuevo Nombre de Nuevo Usuario
    $_precio   = $_POST['precio']; //Nuevo Apellido de Nuevo Usuario
    $_empresa  = $_POST['empresa']; //Nueva Cedula de Nuevo Usuario

    //Meter todo en la nueva variable insercion
    if (isset($_nombre) == null OR isset($_precio) == null OR
        isset($_empresa) == null) {
            echo '<script>alert("Debe rellenar todos los campos"); window.location.href = "agregar_productos.php";</script>';
    } else {
        $insercion = "INSERT productos SET
        nombre  = '$_nombre',
        empresa  = '$_empresa',
        precio   = '$_precio'
        ";
    
        $resultado = $mysqli->query($insercion); //Insertar la insercion dentro del MySQL

        //Resultados, Si se guardo exitosamente o no
        if ($resultado) {
            echo '<script>alert("Producto agregado con exito"); window.location.href = "agregar_productos.php";</script>'; //Exito: Regresar a la pestaña de agregar usuarios
        } else {
            echo "Hubo un error al intentar guardar los datos"; //Fallo: Informar del fallo
        }

    }
    
    //Cierra la conexion MySQL
    $mysqli->close();

?>