<?php

    session_start();

    //haciendo conexion con el MySQL
    $mysqli = new mysqli("localhost","root","","base_de_datos_prueba");

    //Seleccionando toda la info en la base de datos de usuarios_venta
    $consulta = "SELECT * FROM usuarios_venta";

    //Extrayendo la info
    $resultados = $mysqli->query($consulta);

    //Buscando toda la info en la variable resultados
    $filas = $resultados->fetch_all(MYSQLI_ASSOC);

    //Si se ha buscado alguna informacion
    if (isset($_POST['busqueda'])) {

        //Inserta el termino para ser buscado en el MySQL (solo si las partes de string, para evitar el 🔥[MYSQL INYECTION]🔥)
        $Termino = $mysqli->real_escape_string($_POST['busqueda']);

        //Busca en las secciones seleccionadas la variable que sea igual a "busqueda"
        $consulta_BUSCAR = "SELECT * FROM usuarios_venta WHERE  /* Selecciona de la base de datos de usuarios_venta, y encuentra la variable que concuerde con...*/
        (nombres LIKE '%$Termino%') /* El nombre del usuario */
        OR (apellido LIKE '%$Termino%') /* O el apellido del usuario */
        OR (cedula LIKE '%$Termino%') /* O la cedula del usuario */
        OR (telefono LIKE '%$Termino%') /* O el telefono del usuario */
        OR (correo LIKE '%$Termino%')"; /* O el correo del usuario */
        
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

    <ul class="nav justify-content-end bg-success">

        <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#">Dashboard</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="#">Usuarios</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="#">Admin</a>
        </li>

        <li class="nav-item">
            <a href = "../logout.php" class="nav-link text-white" aria-disabled="true">Cerrar Sesion (<?php echo $_SESSION['nombre_user']; ?>)</a>
        </li>

    </ul>

    <div class = "container text-center mt-5">

        <h1> Listado de Usuarios </h1>

    </div>

    <div class = "container">

    <div class = "card">

        <div class = "card-header">

        <div class="container text-center">

            <div class="row">

                <div class="col">
                    <a href="agregar_usuarios.php"><button class = "btn btn-primary">Agregar Usuario</button></a>
                </div>

                <div class="col">
                    <form action="estudiantes.php" method = "post">
                        <div class="input-group mb-2">
                                <input type="text" name = "busqueda" class="form-control"  placeholder="Buscar usuario por cedula" aria-describedby="basic-addon1">
                                <button type = "submit" class = "btn btn-primary">Buscar</button>
                                <a href = "estudiantes.php"><button type = "button" class = "btn btn-secondary">Resetear</button></a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

        <div class="container text-center">
            <?php  if (isset($_POST['busqueda'])) {echo "Resultados de busqueda para: ".$_POST['busqueda'];} ?>
        </div>

        </div>

        <div class = "card-body table-scroll">
            <table class = "table table-sm text-center">

                <thead>

                    <tr class="bg-primary">

                        <th>#</th>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>CEDULA</th>
                        <th>TELEFONO</th>
                        <th>CORREO</th>
                        <th>ACCIONES</th>

                    </tr>

                </thead>

                <tbody>

                <?php 

                    //Haciendo las tablas con la info de la base de datos "usuarios_venta"

                    if (isset($_POST['busqueda'])) { //Muestra las tablas que fueron buscadas con la variable "busqueda"
                        $num = 1;

                        foreach ($filas_BUSCAR as $fila_buscar){?>
    
                            <tr>
    
                            <td><?php echo $num++; ?></td>
                            <td><?php echo $fila_buscar['nombres'] ?></td>
                            <td><?php echo $fila_buscar['apellido'] ?></td>
                            <td><?php echo $fila_buscar['cedula'] ?></td>
                            <td><?php echo $fila_buscar['telefono'] ?></td>
                            <td><?php echo $fila_buscar['correo'] ?></td>
                            <td>
    
                                <button type = "button" class = "btn btn-warning">E</button>
    
                            </td>
    
                            </tr>
    
    
                    <?php
    
                    }
                    } else { //Muestra todas las tablas al iniciar por primera vez
                        $num = 1;

                        foreach ($filas as $fila){
                    ?>

                            <tr>

                            <td><?php echo $num++; ?></td>
                            <td><?php echo $fila['nombres'] ?></td>
                            <td><?php echo $fila['apellido'] ?></td>
                            <td><?php echo $fila['cedula'] ?></td>
                            <td><?php echo $fila['telefono'] ?></td>
                            <td><?php echo $fila['correo'] ?></td>
                            <td>

                                <button type = "button" class = "btn btn-warning">E</button>

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