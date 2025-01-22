<?php
    session_start();

    $mysqli = new mysqli("localhost","root","","base_de_datos_prueba");

    $_nombre   = $_POST['nombres_usuario']; //Nuevo Nombre de Nuevo Usuario
    $_apellido = $_POST['apellidos_usuario']; //Nuevo Apellido de Nuevo Usuario
    $_cedula   = $_POST['cedula_usuario']; //Nueva Cedula de Nuevo Usuario
    $_correo   = $_POST['correo_usuario']; //Nuevo Correo de Nuevo Usuario
    $_telefono = $_POST['telefono_usuario']; //Nuevo Telefono de Nuevo Usuario

    //Meter todo en la nueva variable insercion
    $insercion = "INSERT usuarios_venta SET
        nombres  = '$_nombre',
        apellido = '$_apellido',
        cedula   = '$_cedula',
        telefono = '$_telefono',
        correo   = '$_correo'
    ";

    $resultado = $mysqli->query($insercion); //Insertar la insercion dentro del MySQL

    //Resultados, Si se guardo exitosamente o no
    if ($resultado) {
        echo '<script>alert("Usuario agregado con exito"); window.location.href = "agregar_usuarios.php";</script>'; //Exito: Regresar a la pestaña de agregar usuarios
    } else {
        echo "Hubo un error al intentar guardar los datos"; //Fallo: Informar del fallo
    }
    
    $mysqli->close();

?>