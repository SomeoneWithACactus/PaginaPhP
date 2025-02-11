<?php

    session_start();

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

    <!--- Barrita de Arriba --->
    <ul class="nav justify-content-end bg-danger">
    <!--- (Todo esto se cambia a los datos que vayas a necesitar) --->

        <!--- Dashboard --->
        <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>

        <!--- Usuarios --->
        <li class="nav-item">
            <a class="nav-link text-white" href="../usuarios.php">Usuarios</a>
        </li>

        <!--- Sesion --->
        <li class="nav-item">
            <a href = "../logout.php" class="nav-link text-white" aria-disabled="true">Cerrar Sesion (<?php echo $_SESSION['nombre_user']; ?>)</a>
        </li>

    </ul>

    <div class = "container text-center mt-5">

        <h1> Editar Usuarios </h1>

    </div>

    <?php
    
        $id = base64_decode($_GET['id']);

        //haciendo conexion con el MySQL
        $mysqli = new mysqli("localhost","root","","base_de_datos_prueba");

        $consulta_BUSCAR = "SELECT * FROM productos WHERE  /* Seleccionar del usuario_venta: */
        (id LIKE '$id')"; /* la id que sea EXACTAMENTE igual a la variable "$id"*/
        
        $resultados_BUSCAR = $mysqli->query($consulta_BUSCAR); //Define la variable que va a buscar

        $filas_BUSCAR = $resultados_BUSCAR->fetch_assoc(); //BUSCA EN BASE A LA ID SELECCIONADA
    
    ?>

    <div class = "container">

    <div class = "card">

        <div class = "card-body">

        <?php 
            //Toda la parte que muestra las barritas para editar a cada parte
            if ($resultados_BUSCAR->num_rows == 1) { 
                ?>

                <form action = "editar_p.php" method = "POST">

                <div class="container text-center">

                    <div class="row">

                        <div class="col">
                        <label for=""><b>Nombre</b></label>
                        <input type="text" class = "form-control" name = "nombre" value = "<?php echo $filas_BUSCAR['nombre']; ?>" maxlength="60" required="">
                        </div>

                        <div class="col">
                        <label for=""><b>Empresa</b></label>
                        <input type="text" class = "form-control" name = "empresa" value = "<?php echo $filas_BUSCAR['empresa']; ?>" maxlength="60" required="">
                        </div>
                        

                    </div>

                </div>

                <div class="container text-center">

                    <div class="row">

                        <div class="col-4">
                        <label for=""><b>Precio</b></label>
                        <input type="number" class = "form-control" name = "precio" value = "<?php echo $filas_BUSCAR['precio']; ?>" maxlength="10" required="">
                        </div>

                </div>

                <!-- Botones de Acciones -->
                <div class = "text-center mt-3">

                    <!-- Cancelar, te regresa a la pagina con los usuarios -->
                    <a href = "productos.php"><button class = "btn btn-danger" type="button">Cancelar</button></a>

                    <!-- Borrar, recarga la pagina y elimina todo lo escrito -->
                    <button class = "btn btn-secondary" type="reset">Borrar</button>

                    <!-- Actualizar, guarda todo lo escrito en su registro correspondiente -->
                    <button class = "btn btn-primary" type="submit">Actualizar</button>

                </div>

                <!-- En secreto: pasa la id del usuario para ser revisada y editada posteriormente en el archivo "editar.php" -->
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                </form>

                <?php
            } else {
                echo "Resultados no encontrados";
            }   

        ?>

        </div>

        </div>

    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>