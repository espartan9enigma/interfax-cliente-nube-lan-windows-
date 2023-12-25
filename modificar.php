<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modificar informacion</title>
	<link rel="stylesheet" href="estilo_crud.css">
</head>
<body>

	<div class="tools">
	    
	    <a href="agregar.php" class="item">Agregar</a> &nbsp;] [&nbsp;
	    <a href="modificar.php" class="item active">Modificar</a> &nbsp;] [&nbsp;
	    <a href="eliminacion.php" class="item">Eliminar</a> &nbsp;] [&nbsp;
	    <a href="mostrar.php" class="item">Tabla de registros</a> &nbsp;]
		<a href="index_admin.php" class = "item">Regresar inicio</a>
	</div>
	

	<div class="principal form">
	    <div class="tabla">
	        <table class="cuadro">
	            <style type="text/css">
	                .cuadro tr td {
	                    border: 3px solid darkred;
	                }
	            </style>
	            <?php
	            include("consultacion.php");

	            $registros = new Registros();
	            $datosUsuario = array(
	                "idPosicion" => null,
	                "usuario" => "",
	                "contrasena" => "",
	                "correo" => "",
	                "dni" => "",
	                "sexo" => ""
	            );

	            if (isset($_POST['miBoton'])) {
	                $valor = $_POST['miBoton'];
	                echo "Valor del botón: " . $valor . "<br>";
	                $datosConsulta = $registros->consulta("*", $valor); // Esto recibe todos los datos

	                foreach ($datosConsulta as $fila) {
	                    $datosUsuario["usuario"] = $fila->usuario;
	                    $datosUsuario["contrasena"] = $fila->contrasena;
	                    $datosUsuario["correo"] = $fila->correo;
	                    $datosUsuario["dni"] = $fila->dni;
	                    $datosUsuario["sexo"] = $fila->sexo;
	                    $datosUsuario["idPosicion"] = $fila->id;
	                }
	            }
	            echo "idPosicion : " . $datosUsuario["idPosicion"] . "<br>";

	            ?>

	            <tr>
	                <!-- Titulo de la tabla -->
	                <td colspan="7">
	                    <center>
	                        Registro de usuarios registrados
	                    </center>
	                </td>
	            </tr>
	            <tr>
	                <!-- Abajo están las columnas -->
	                <td>
	                    <center>
	                        <h4>d</h4>
	                    </center>
	                    <?php
	                    $IDs = $registros->consulta("id");

	                    foreach ($IDs as $fila) {
	                        echo "<form method='post'>
	                                  <button type='submit' name='miBoton' value='" . $fila->id . "'>Editar</button>
	                              </form>";
	                    }
	                    ?>
	                </td>
	                <td>
	                    <center>
	                        <h4>ID</h4>
	                    </center>
	                    <?php
	                    $IDs = $registros->consulta("id");

	                    foreach ($IDs as $fila) {
	                        echo "$fila->id <br>";
	                    }
	                    ?>
	                </td>
	                <td>
	                    <center>
	                        <h4>Usuario</h4>
	                    </center>
	                    <?php
	                    $usuarios = $registros->consulta("usuario");

	                    foreach ($usuarios as $fila) {
	                        echo "$fila->usuario <br>";
	                    }
	                    ?>
	                </td>
	                <td>
	                    <center>
	                        <h4>Contraseña</h4>
	                    </center>
	                    <?php
	                    $contrasenas = $registros->consulta("contrasena");

	                    foreach ($contrasenas as $fila) {
	                        echo "$fila->contrasena <br>";
	                    }
	                    ?>
	                </td>
	                <td>
	                    <center>
	                        <h4>Correo</h4>
	                    </center>
	                    <?php
	                    $correos = $registros->consulta("correo");

	                    foreach ($correos as $fila) {
	                        echo "$fila->correo <br>";
	                    }
	                    ?>
	                </td>
	                <td>
	                    <center>
	                        <h4>DNI</h4>
	                    </center>
	                    <?php
	                    $dnis = $registros->consulta("dni");

	                    foreach ($dnis as $fila) {
	                        echo "$fila->dni <br>";
	                    }
	                    ?>
	                </td>
	                <td>
	                    <center>
	                        <h4>Sexo</h4>
	                    </center>
	                    <?php
	                    $resultados = $registros->consulta("sexo");

	                    foreach ($resultados as $fila) {
	                        echo "$fila->sexo <br>";
	                    }
	                    ?>
	                </td>
	            </tr>
	        </table>
	    </div>
	</div>
	<div class = "formulario de modificacion form2">
		<div class = "Usuario seleccionado">
			<form method="post">
				
			 <table>
                <tr>
                    <td>Columna</td>
                    <td>Valor</td>
                </tr>
                <tr>
                    <td>Usuario</td>
                    <td>
                        <input type="text" name="inputUsuario" value="<?php echo $datosUsuario["usuario"]; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                    <td>
                        <input type="text" name="inputContrasena" value="<?php echo $datosUsuario["contrasena"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td>
                        <textarea type="text" name="inputCorreo"><?php echo $datosUsuario["correo"] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>DNI</td>
                    <td>
                        <input type="text" name="inputDni" value="<?php echo $datosUsuario["dni"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Sexo</td>
                    <td>
                        <input type="text" name="inputSexo" value="<?php echo $datosUsuario["sexo"] ?>">
                    </td>
                </tr>
            	<input type="hidden" name="idPO" value="<?php echo $datosUsuario["idPosicion"] ?>"> <!-- Esta etiqueta no la queria poner pero es muy importante -->
            </table>
            <button type="submit" name="modificacionValores" id="modificacionValores">Actualizar valores</button>
        </form>
    </div>
    <?php

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		    if (isset($_POST["modificacionValores"])) {
		        // Llama a la función $registros->modificacion con los argumentos adecuados
		        $registros->modificacion(
		            $_POST["idPO"],
		            $_POST["inputUsuario"],
		            $_POST["inputSexo"],
		            $_POST["inputCorreo"],
		            $_POST["inputDni"],
		            $_POST["inputContrasena"]
		        );

				echo "<h2>Presiona denuevo para confirmar la modificacion</h2>";
		        // Puedes agregar un mensaje de confirmación aquí si lo deseas
		    } else {
		        echo "<br>nop " . $datosUsuario["idPosicion"];
		    }
		}
     ?>
</div>



</body>
</html>