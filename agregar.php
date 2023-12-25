<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Agregacion de usuarios </title>
	<link rel="stylesheet" href="estilo_crud.css">
</head>
<body>

	<div class="tools">
		
		<a href="agregar.php" class = "item active">Agregar</a>&nbsp;] [&nbsp;
		<a href="modificar.php" class = "item">Modificar</a>&nbsp;] [&nbsp;
		<a href="eliminacion.php" class = "item">Eliminar</a>&nbsp;] [&nbsp;
		<a href="mostrar.php" class = "item">Tabla de registros</a>&nbsp;]
		<a href="index_admin.php" class = "item">Regresar inicio</a>
	</div>
	<div class="principal"> <!-- Agregamos la clase "principal" aquí -->
	    <div class="tabla">
	        <?php if (!empty($mensajeError)): ?>
	            <p style="color: red;"><?php echo $mensajeError; ?></p>
	        <?php endif; ?>

       <form method="post" class="form">
        	<legend> <strong class= title>Datos Personales</strong></legend>     
            
 			<div align="left"> <!-- izquierdo-->
				<p>
			        <label>Nombres:
			        	<div class="caja-entrada" id="caja-entrada">
			        		<input class="caja-entrada"  name="firstName" />
			        	</div>
			        </label>
			      </p>
				<p>
		        	<label>Apellidos: <br> 
			        	<div class="caja-entrada" id="caja-entrada1">
			        		<input class="caja-entrada" name="lastName" />
			        	</div>
		        	</label>
		    	</p>
	   
	 			<p>
			        Genero : <br>
			        <label><input type="radio" name="gender" value="1" /> Masculino</label>
			        <label><input type="radio" name="gender" value="2" /> Femenino</label>
		   		</p>
		
		 
		       
		 	<div align="right">	 <!-- derecho -->
				<p>
			    	<label>Email:
			        	<div class="caja-entrada" id="caja-entrada2" onclick="cambioBorde(id) " value style="margin-top: 0px;">
			        		<input class="caja-entrada" type="email" name="email" />
			     	  	</div>
					</label>
		        		
				</p>
                <p>
                    <label>DNI:
                        <div class="caja-entrada" id="caja-entrada2" onclick="cambioBorde(id) " value style="margin-top: 0px;">
                            <input class="caja-entrada" type="number" name="dni" />
                        </div>
                    </label>
                        
                </p>
   				<p>
		        	<label>Contraseña: <br> 
			        	<div class="caja-entrada" id="caja-entrada1" onclick="cambioBorde(id)" value style="margin-top: 0px;">
			        		<input class="caja-entrada" name="contrasena" />
			        	</div>
		        	</label>
		    	</p>
	 		</div>
            <input type="submit" name="calcular" id="calcular" value="Agregar" class="botom">
            <input type="submit" name="limpiar" value="Limpiar consola" class="botom">
			
        </form>
		
    
    <?php
        if (isset($_POST['calcular'])) {
            $nombres = $_POST["firstName"];
            $apellidos = $_POST["lastName"];
            $genero = isset($_POST["gender"]) ? $_POST["gender"] : "";
            $email = $_POST["email"];
			$contrasena = $_POST["contrasena"];
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
                    </table>
                </div>
                ";   
            }
        }        
?>


	    </div>
	</div>


</body>
</html>