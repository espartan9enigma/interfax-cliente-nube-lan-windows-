<?php

    
    if (isset($_POST['registro'])) {
        $nombres = $_POST["nombre"];
        $apellidos = $_POST["apellido"];
        $genero = isset($_POST["gender"]) ? $_POST["gender"] : "";
        $email = $_POST["correo"];
        $contrasena = $_POST["contra"];
        $dni = $_POST["dni"];
        

        // Verificar si alguna de las lecturas es nula o si son iguales
        if (empty($nombres) || empty($apellidos) || empty($email) || empty($dni) || empty($genero)) {

            echo "
            <br>
            <div class='tabla'>
                <table>
                    La entrada de datos no es válida
                </table>
            </div>
            ";

        } else {

            require("consultacion.php");
            $registrando = new Registros();
            $registrando->registrar($nombres, $apellidos, $genero, $email, $dni, $contrasena);
            echo "
            <br>
            <div class='tabla'>
                <table>
                <br>
                    El usuario ha sido agregado con Exito 
                    <a href=login.php > Regrasar a Inicio de Sesion</a>
                </table>
            </div>
            ";   
        }
    }        
?>
