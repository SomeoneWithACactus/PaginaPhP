<?php
    session_start();

    //RECUERDA CAMBIAR "base_de_datos_prueba" POR EL NOMBRE DE TU BASE DE DATOS LOCAL EN MYSQL
    $mysqli = new mysqli("localhost","root","","base_de_datos_prueba");

    $_id       = $_POST['id_usuario']; //Id del Usuario a Editar
    $_nombre   = $_POST['nombres_usuario']; //Nuevo Nombre del Usuario a Editar
    $_apellido = $_POST['apellidos_usuario']; //Nuevo Apellido del Usuario a Editar
    $_cedula   = $_POST['cedula_usuario']; //Nueva Cedula del Usuario a Editar
    $_correo   = $_POST['correo_usuario']; //Nuevo Correo del Usuario a Editar
    $_telefono = $_POST['telefono_usuario']; //Nuevo Telefono del Usuario a Editar


    if (isset($_nombre) == null OR isset($_apellido) == null OR //Revisando si todos los campos estan llenos correctamente
        isset($_cedula) == null OR isset($_correo) == null OR
        isset($_telefono) == null) { 
            //En caso de que no
            echo '<script>alert("Debe rellenar todos los campos"); window.location.href = "estudiantes.php";</script>';
    } else {
            //En caso de que si
        $edicion = "UPDATE usuarios_venta SET
            nombres  = '$_nombre',
            apellido = '$_apellido',
            cedula   = '$_cedula',
            telefono = '$_telefono',
            correo   = '$_correo'

            WHERE id = $_id
            ";

        $resultado = $mysqli->query($edicion); //Insertar la insercion dentro del MySQL

        //Resultados, Si se guardo exitosamente o no
        if ($resultado) {
            echo '<script>alert("Usuario actualizado con exito"); window.location.href = "estudiantes.php";</script>'; //Exito: Regresar a la pestaña de agregar usuarios
        } else {
            echo "Hubo un error al intentar guardar los datos"; //Fallo: Informar del fallo
        }

    }

    //Cierra la conexion MySQL
    $mysqli->close();

?>