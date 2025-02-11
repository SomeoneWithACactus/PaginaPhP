<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel = "stylesheet" href="../../css/principal.css">
</head>
<body>

<ul class="nav justify-content-center bg-danger" id = "navegacion">
        
        <div class="title container-fluid  text-white">
            <a class="navbar-brand">
              Bienvenid@, <?php echo $_SESSION['nombre_user']; ?>
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
            <a href = "usuarios.php" class="nav-link text-white" aria-disabled="true">Usuarios</a>
        </li>
        <li class="nav-item">
            <a href = "../logout.php" class="nav-link text-white" aria-disabled="true">Cerrar Sesion</a>
        </li>
        <li class="nav-item">
            <a href = "productos/productos.php" class="nav-link text-white" aria-disabled="true">Productos</a>
        </li>

    </ul>
<!--
    <div class="container text-center">
    <div class="row">

            <div class="col">
                <div class = "container-fluid d-flex align-items-center justify-content-center"
                style = "height: 50vh;"></i>">

                    <div class="card" style="width: 18rem;">
                        <div class = "card-header text-center fs-4 bg-success text-white">Cantidad de Estudiantes </div>
                        <div class="card-body bg-success text-white">

                            <h1>
                                <?php 
                                
                                
                                ?>
                            </h1>


                    </div>
                </div>
            </div>
            
        </div>

        <div class="col">

            <div class="col">
                    <div class = "container-fluid d-flex align-items-center justify-content-center"
                    style = "height: 50vh;"></i>">

                        <div class="card" style="width: 18rem;">
                            <div class = "card-header text-center fs-4 bg-success text-white">Cantidad de Profesores</div>
                            <div class="card-body bg-success text-white">

                            <h1>
                                20
                            </h1>

                        </div>
                    </div>
                </div>

        </div>
        
    </div>
    </div>
    -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>