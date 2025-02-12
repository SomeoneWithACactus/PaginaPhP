<?php

    session_start();

    //haciendo conexion con el MySQL
    $mysqli = new mysqli("localhost","root","","base_de_datos_prueba");

    //Seleccionando toda la info en la base de datos de usuarios_venta
    $consulta = "SELECT * FROM productos";

    //Extrayendo la info
    $resultados = $mysqli->query($consulta);

    //Buscando toda la info en la variable resultados
    $filas = $resultados->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El triciclo de dos ruedas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel = "stylesheet" href="css/principal.css">
</head>
<body>


    <ul class="nav justify-content-center bg-danger" id = "navegacion">
        
        <div class="title container-fluid  text-white">
            <a class="navbar-brand">
              ¡Bienvenido al Triciclo de dos ruedas!
            </a>
          </div>

        <!--<img src="img/logo.png" alt="Logo" width="64" height="64" class="d-inline-block align-text-top">
        <li class="nav-item">
            <a href = "estudiantes.php" class="nav-link text-white" href="#">Usuarios</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="#">Admin</a>
        </li>
        -->

        <li class="nav-item">
            <a href = "main_user.php" class="nav-link text-white" aria-disabled="true">Productos</a>
        </li>
        <li class="nav-item">
            <a href = "php/logout.php" class="nav-link text-white" aria-disabled="true">Cerrar Sesion</a>
        </li>


    </ul>

    <div class = "logo" align="middle"  aria-hidden="true">

        <img src = "img/logo.png" width="250" height="250" alt = "Logo">

    </div>

    <div class = "container text-center mt-5">

    <div class = "card-body table-scroll">
        <table class = "table table-sm text-center">


            <thead>

                <tr class="bg-primary">

                    <th>#</th>
                    <th>PRODUCTOS</th>
                    <th>EMPRESA</th>
                    <th>PRECIOS</th>


                </tr>

            </thead>

            <tbody>

            <?php 

                //Haciendo las tablas con la info de la base de datos "usuarios_venta"
                    $num = 1;

                    foreach ($filas as $fila){
                ?>

                        <tr>

                        <td><?php echo $num++; ?></td> <!--- Numero que agrega por cada fila para tener todo ordenatido --->
                        <td><?php echo $fila['nombre'] ?></td>  <!--- Nombres de Cada Fila --->
                        <td><?php echo $fila['empresa'] ?></td>  <!--- Nombres de Cada Fila --->
                        <td><?php echo $fila['precio'] ?> bs.</td> <!--- Apellidos de Cada Fila --->

                        <td>

                        <button type = "button" class = "btn btn-warning" data-bs-toggle="modal" data-bs-target="#CompraModal_<?php echo $fila['id']; ?>">Comprar</button>

                        <!-- Modal -->
                        <div class="modal fade" id="CompraModal_<?php echo $fila['id']; ?>" tabindex="-1" aria-labelledby="CompraModal_" aria-hidden="true">
                                
                                <div class="modal-dialog">

                                    <!--- Contenido del Modal --->
                                    <div class="modal-content">

                                        <div class="modal-header bg-warning text-white"> <!--- Clase: Cabezal del Modal, Color del modal (bg-danger = rojo), color del texto --->
                                            
                                            <!--- Titulo del Modal --->
                                            <h1 class="modal-title fs-5" id="CompraModal_">Comprar Producto</h1>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                        </div>

                                        <!--- Mensaje del Modal --->
                                        <div class="modal-body">
                                            <h4>¿Desea comprar el producto: <?php echo $fila['nombre']; ?> <br> por <?php  echo $fila['precio']; ?>?</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <!--- Boton de Cancelar --->
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <!--- Boton de borrar --->
                                            <a href = "php/thanksforyourbuy.php" ><button type = "button" class = "btn btn-success">Comprar Producto</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </td>

                        </tr>


                <?php

                }
                                        
                
                ?>



            </tbody>

        </table>

    </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>