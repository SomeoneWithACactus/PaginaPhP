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

    //Si se ha buscado alguna informacion
    if (isset($_POST['busqueda'])) {

        //Inserta el termino para ser buscado en el MySQL (solo si las partes de string, para evitar el 🔥[MYSQL INYECTION]🔥)
        $Termino = $mysqli->real_escape_string($_POST['busqueda']);

        //Busca en las secciones seleccionadas la variable que sea igual a "busqueda"
        $consulta_BUSCAR = "SELECT * FROM productos WHERE  /* Selecciona de la base de datos de usuarios_venta, y encuentra la variable que concuerde con...*/
        (nombre LIKE '%$Termino%')"; /* O el correo del usuario */
        
        $resultados_BUSCAR = $mysqli->query($consulta_BUSCAR); //Define la variable que va a buscar todo

        $filas_BUSCAR = $resultados_BUSCAR->fetch_all(MYSQLI_ASSOC); //BUSCA EN BASE A LO ANTERIORMENTE SELECCIONADO
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel = "stylesheet" href="../../css/estilo.css">

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
        
        <!--- Titulo del listado de usuarios --->
        <h1> Listado de Usuarios </h1>

    </div>

    <div class = "container">

    <div class = "card">

        <div class = "card-header">

        <div class="container text-center">

            <div class="row">

                <div class="col">
                    <!--- Boton para agregar un usuario --->
                    <a href="agregar_productos.php"><button class = "btn btn-primary">Agregar Producto</button></a>
                </div>

                <div class="col">
                    <form action="productos.php" method = "post">
                        <div class="input-group mb-2">
                                <input type="text" name = "busqueda" class="form-control"  placeholder="Buscar usuario por cedula" aria-describedby="basic-addon1">
                                <!--- Boton para buscar un registro --->
                                <button type = "submit" class = "btn btn-primary">Buscar</button>
                                <!--- Boton para regresar a la pagina principal de los registros --->
                                <a href = "productos.php"><button type = "button" class = "btn btn-secondary">Resetear</button></a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

        <!--- Texto que solo aparece una vez has buscado un registro --->
        <div class="container text-center">
            <?php  if (isset($_POST['busqueda'])) {echo "Resultados de busqueda para: ".$_POST['busqueda'];} ?>
        </div>

        </div>

        <!--- TITULO DE LA TABLA PRINCIPAL --->
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

                    if (isset($_POST['busqueda'])) { //Muestra las tablas que fueron buscadas con la variable "busqueda"
                        $num = 1;

                        foreach ($filas_BUSCAR as $fila_buscar){?>
    
                            <tr>
    
                            <td><?php echo $num++; ?></td> <!--- Numero que agrega por cada fila para tener todo ordenatido --->
                            <td><?php echo $fila_buscar['nombre'] ?></td>  <!--- Nombres de Cada Fila --->
                            <td><?php echo $fila_buscar['empresa'] ?></td>  <!--- Nombres de Cada Fila --->
                            <td><?php echo $fila_buscar['precio'] ?> bs.</td> <!--- Apellidos de Cada Fila --->

                            <td>
    
                            <a href = "editar_productos.php?id=<?php echo base64_encode($fila_buscar['id']); ?>"><button type = "button" class = "btn btn-warning">E</button></a>

                            <button type = "button" class = "btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModalSearch_<?php echo $fila_buscar['id']; ?>">X</button>


                            <!-- Modal -->
                            <div class="modal fade" id="DeleteModalSearch_<?php echo $fila_buscar['id']; ?>" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
                                
                                <div class="modal-dialog">

                                    <!--- Contenido del Modal --->
                                    <div class="modal-content">

                                        <div class="modal-header bg-danger text-white"> <!--- Clase: Cabezal del Modal, Color del modal (bg-danger = rojo), color del texto --->
                                            
                                            <!--- Titulo del Modal --->
                                            <h1 class="modal-title fs-5" id="DeleteModalLabel">Eliminar Registro</h1>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                        </div>

                                        <!--- Mensaje del Modal --->
                                        <div class="modal-body">
                                            <h4>¿Seguro que desea eliminar el registro del producto: <?php echo $fila_buscar['nombre']; ?>?</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <!--- Boton de Cancelar --->
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <!--- Boton de borrar --->
                                            <a href = "borrar_p.php?id=<?php echo base64_encode($fila_buscar['id']); ?>"><button type = "button" class = "btn btn-danger">Eliminar Registro</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </td>
    
                            </tr>
    
    
                    <?php
    
                    }
                    } else { //Muestra todas las tablas al iniciar por primera vez
                        $num = 1;

                        foreach ($filas as $fila){
                    ?>

                            <tr>

                            <td><?php echo $num++; ?></td> <!--- Numero que agrega por cada fila para tener todo ordenatido --->
                            <td><?php echo $fila['nombre'] ?></td>  <!--- Nombres de Cada Fila --->
                            <td><?php echo $fila['empresa'] ?></td>  <!--- Nombres de Cada Fila --->
                            <td><?php echo $fila['precio'] ?> bs.</td> <!--- Apellidos de Cada Fila --->

                            <td>

                            <a href = "editar_productos.php?id=<?php echo base64_encode($fila['id']); ?>"><button type = "button" class = "btn btn-warning">E</button></a>

                            <button type = "button" class = "btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal_<?php echo $fila['id']; ?>">X</button>


                            <!-- Modal -->
                            <div class="modal fade" id="DeleteModal_<?php echo $fila['id']; ?>" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <!--- Contenido del Modal --->
                                    <div class="modal-content">

                                        <div class="modal-header bg-danger text-white"> <!--- Clase: Cabezal del Modal, Color del modal (bg-danger = rojo), color del texto --->

                                            <!--- Titulo del Modal --->
                                            <h1 class="modal-title fs-5" id="DeleteModalLabel">Eliminar Registro</h1>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                        </div>

                                        <div class="modal-body">
                                            <!--- Mensaje del Modal --->
                                            <h4>¿Seguro que desea eliminar el registro del producto: <?php echo $fila['nombre']; ?>?</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <!--- Boton de Cancelar --->
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <!--- Boton de borrar --->
                                            <a href = "borrar_p.php?id=<?php echo base64_encode($fila['id']); ?>"><button type = "button" class = "btn btn-danger">Eliminar Registro</button></a>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            </td>

                            </tr>


                    <?php

                    }
                        }
                        
                    
                    ?>



                </tbody>

            </table>

        </div>

        </div>

    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>