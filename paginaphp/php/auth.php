<?php

    session_start();



    $_usario = $_POST['user']; //Variable con el nombre de usuario
    $_contra = $_POST['pass']; //Variable con la contraseña de usuario
    

    if (empty($_usario) OR empty($_contra)) { //En caso de que alguna de las variables esten vacias

            echo "Debe ingresar su usario y contraseña";

            exit();

    }

    //Conectandose con el host de la base de datos de mysqli (cambia esto a tu host local (que deberia ser localhost igual)
    //y el nombre de la base de datos, deja root y password igual)
    //RECUERDA CAMBIAR "base_de_datos_prueba" POR EL NOMBRE DE TU BASE DE DATOS LOCAL EN MYSQL
    $mysqli = new mysqli("localhost","root","","base_de_datos_prueba");
        
        //Selecciona el registro de usuario en base al nombre de usuario de la variable _usuario
        $query = "SELECT * FROM usuarios_venta WHERE cedula = '$_usario'";
        //almacenalo en la variable result
        $result = $mysqli->query($query);

        //Selecciona el registro de usuario en base al nombre de usuario de la variable _usuario
        $query_admin = "SELECT * FROM usuarios WHERE cedula = '$_usario'";
        //almacenalo en la variable result
        $result_admin = $mysqli->query($query_admin);

        if ($result->num_rows >= 1) {//chequea por la id
            $row = $result->fetch_assoc();//convierte el resultado en un string/int

            //Ingresar Contraseña:

            if ($row['password'] == $_contra) { //--Contraseña que solo verifica si es la misma

            //if (password_verify($_contra,$row['password'])) { //Contraseña que desencripta (no lo hace-)
                
                //Guarda toda la informacion de usuario en las variables de session
                $_SESSION['id_user'] = $row['id'];
                $_SESSION['nombre_user'] = $row['nombres'];
                $_SESSION['apellido_user'] = $row['apellido'];
                $_SESSION['cedula_user'] = $row['cedula'];
                $_SESSION['correo_user'] = $row['correo'];
                $_SESSION['telefono_user'] = $row['telefono'];

                //te lleva a la siguiente pagina USUARIO
                header("Location:../main_user.php");
                exit();

            } else { //En caso de que la contraseña sea incorrecta
                echo "Contraseña Incorrecta";
                exit();
            }
            
        } else { //En caso de que el usuario no exista en la base de datos

            if ($result_admin->num_rows == 1) {//chequea por la id
                $row = $result_admin->fetch_assoc();//convierte el resultado en un string/int
    
                //Ingresar Contraseña:
    
                if ($row['password'] == $_contra) { //--Contraseña que solo verifica si es la misma
    
                //if (password_verify($_contra,$row['password'])) { //Contraseña que desencripta (no lo hace-)
                    
                    //Guarda toda la informacion de usuario en las variables de session
                    $_SESSION['id_user'] = $row['ID'];
                    $_SESSION['nombre_user'] = $row['nombre_usuario'];
                    $_SESSION['correo_user'] = $row['correo'];
                    $_SESSION['tipo_user'] = $row['tipo_usario'];
    
                    //te lleva a la siguiente pagina ADMIN
                    header("Location:admin/dashboard.php");
                    exit();
    
                } else { //En caso de que la contraseña sea incorrecta
                    echo "Contraseña Incorrecta";
                    exit();
                }
                
            } else { //En caso de que el usuario no exista en la base de datos
    
                echo "El usario no existe";
                exit();
    
            }


        }


    //Cierra la conexion MySQL
    $mysqli -> close();
    
    
?>