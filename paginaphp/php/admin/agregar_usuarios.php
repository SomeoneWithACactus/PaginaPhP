<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

    <ul class="nav justify-content-end bg-success">

        <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="estudiantes.php">Usuarios</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="#">Admin</a>
        </li>

        <li class="nav-item">
            <a href = "../logout.php" class="nav-link text-white" aria-disabled="true">Cerrar Sesion (<?php echo $_SESSION['nombre_user']; ?>)</a>
        </li>

    </ul>

    <div class = "container text-center mt-5">

        <h1> Agregar Usuarios </h1>

    </div>

    <div class = "container">

    <div class = "card">

        <div class = "card-body">
           
                <form action = "agregar.php" method = "POST">

                <div class="container text-center">

                    <div class="row">

                        <div class="col">
                        <label for=""><b>Nombres</b></label>
                        <input type="text" class = "form-control" name = "nombres_usuario" maxlength="60" required="">
                        </div>

                        <div class="col">
                        <label for=""><b>Apellidos</b></label>
                        <input type="text" class = "form-control" name = "apellidos_usuario" maxlength="60" required="">
                        </div>
                        

                    </div>

                </div>

                <div class="container text-center">

                    <div class="row">

                        <div class="col-4">
                        <label for=""><b>Cedula</b></label>
                        <input type="number" class = "form-control" name = "cedula_usuario" maxlength="10" required="">
                        </div>

                        <div class="col">
                        <label for=""><b>Correo</b></label>
                        <input type="email" class = "form-control" name = "correo_usuario" maxlength="40" required="">
                        </div>
                        

                    </div>

                </div>

                <div class="container text-center">

                    <div class="row">

                        <div class="col">
                        <label for=""><b>Telefono</b></label>
                        <input type="number" class = "form-control" name = "telefono_usuario" maxlength="15" required="">
                        </div>

                    </div>

                </div>

                <div class = "text-center mt-3">

                    <a href = "estudiantes.php"><button class = "btn btn-danger" type="button">Cancelar</button></a>
                    <button class = "btn btn-secondary" type="reset">Borrar</button>
                    <button class = "btn btn-primary" type="submit">Guardar</button>

                </div>

                </form>

        </div>

        </div>

    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>