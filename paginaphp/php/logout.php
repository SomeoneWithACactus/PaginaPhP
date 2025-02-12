<?php

    session_start(); 
    //Checkea por la id del usuario para salir
    if (!isset($_SESSION['id_user'])) {
        header("Location: ../index.php"); //pagina a la que te va a llevar
        exit();
    }
    //destruye la sesion luego de iniciarla
    session_destroy();

    //mensaje bonito :3
    echo '<script>alert("Vuelva pronto"); window.location.href="../index.php";</script>';

?>