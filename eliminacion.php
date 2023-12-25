<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eliminacion de usuarios</title>
	<link rel="stylesheet" href="estilo_crud.css">
</head>
<body>

	<div class="tools">
	   
	    <a href="agregar.php" class="item">Agregar</a> &nbsp;] [&nbsp;
	    <a href="modificar.php" class="item">Modificar</a> &nbsp;] [&nbsp;
	    <a href="eliminacion.php" class="item active">Eliminar</a> &nbsp;] [&nbsp;
	    <a href="mostrar.php" class="item">Tabla de registros</a> &nbsp;]
		<a href="index_admin.php " class = "item">Regresar inicio</a>
	</div>

	<div class = "principal form">
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
	                $registros->eliminacion($valor);
	                

	                // proceso de eliminacion 

	            }
	            //echo "idPosicion : " . $datosUsuario["idPosicion"] . "<br>";

	            ?>

	            <tr>
	                <!-- Titulo de la tabla -->
	                <td colspan="7">
	                    <center>
	                        Eliminacion de usuarios
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
	                                  <button type='submit' name='miBoton' value='" . $fila->id . "'>Eliminar</button>
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


</body>
</html>