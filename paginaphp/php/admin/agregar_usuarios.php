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

    <!--- Barrita de Arriba --->
    <ul class="nav justify-content-end bg-danger">
    <!--- (Todo esto se cambia a los datos que vayas a necesitar) --->

        <!--- Dashboard --->
        <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>

        <!--- Usuarios --->
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Usuarios</a>
        </li>

        <!--- Sesion --->
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

                    <div class="row">

                        <div class="col">
                        <label for=""><b>Contraseña</b></label>
                        <input type="text" class = "form-control" name = "password_usuario" maxlength="20" required="">
                        </div>

                    </div>

                </div>

                <div class = "text-center mt-3">

                    <a href = "usuarios.php"><button class = "btn btn-danger" type="button">Cancelar</button></a>
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