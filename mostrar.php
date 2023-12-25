<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Tabla de los usuario por usuario </title>
	<link rel="stylesheet" href="estilo_crud.css">
	
</head>
<body>

	<div class="tools">
		
		<a href="agregar.php" class = "item">Agregar</a>&nbsp;] [&nbsp;
		<a href="modificar.php" class = "item">Modificar</a>&nbsp;] [&nbsp;
		<a href="eliminacion.php" class = "item">Eliminar</a>&nbsp;] [&nbsp;
		<a href="mostrar.php" class = "item active">Tabla de registros</a>&nbsp;]
		<a href="index_admin.php" class = "item">Regresar inicio</a>
	</div>

	<div class = "principal form">
		<div class = "tabla">
			
			<table class = "cuadro">
				<style type="text/css">
					.cuadro tr td {
						border: 3px solid darkred;
					}

				</style>
				<?php 
				include("consultacion.php")
				 ?>

				<tr>
					<!-- Titulo de la tabla -->
					<center>
						Registro de usuarios registrados
					</center>


					<!-- Abajo estan las columnas -->
					<td>
					    <center>
					        <h4>ID</h4>
					    </center>
					    <?php 
					    $registros = new Registros();
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
					    $registros = new Registros();
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
					    $registros = new Registros();
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
					    $registros = new Registros();
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
					    $registros = new Registros();
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
						    $registros = new Registros();
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