<?php

    //RECUERDA CAMBIAR "base_de_datos_prueba" POR EL NOMBRE DE TU BASE DE DATOS LOCAL EN MYSQL
    $mysqli = new mysqli("localhost","root","","base_de_datos_prueba");

    $_id = base64_decode($_GET['id']); //Id del usuario a eliminar

    $eliminacion = "DELETE FROM usuarios_venta WHERE id= $_id";
    $resultado = $mysqli->query($eliminacion);

    //Resultados, Si se elimino exitosamente o no
    if ($resultado) {
        echo '<script>alert("Usuario eliminado con exito"); window.location.href = "usuarios.php";</script>'; //Exito: Regresar a la pestaña de agregar usuarios
    } else {
        echo "Hubo un error al intentar guardar los datos"; //Fallo: Informar del fallo
    }

    //Cierra la conexion MySQL
    $mysqli->close();

?>