<!DOCTYPE html>
<html>
<head>
  <title>Página de registro</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilo_login.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body >
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Formulario de registro -->
        <form action="" method="POST">

          <h2 class="mt-5 mb-4">Regístrate</h2>
          <!-- Campo de entrada para el nombre de usuario -->
          <div class="form-group">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
          </div>
          <!-- Campo de entrada para el apellido de usuario -->
          <div class="form-group">
		        	
			        		<input type="text" class="form-control" name="apellido" placeholder="Apellido" required />
		    	</div>
          <!-- Campo de entrada para la contraseña -->
          <div class="form-group">
            <input type="password" class="form-control" name="contra" placeholder="Contraseña" required>
          </div>
		  <!-- Campo de entrada para el correo -->
          <div class="form-group">
            <input type="email" class="form-control" name="correo" placeholder="Correo" required>
          </div>
      <!-- Campo de entrada para el dni -->
      <div class="form-group">
            <input type="text" class="form-control" name="dni" placeholder="Dni" required>
          </div>
          <div  class="form-group">
			        Genero : <br>
			        <label><input type="radio" name="gender" value="1" /> Masculino</label>
			        <label><input type="radio" name="gender" value="2" /> Femenino</label>
		   		</div>

          <!-- Botón para enviar el formulario de registro -->
          <button type="submit" class="btn btn-primary" name="registro">Registrarse</button>
        </form>
        <!-- Enlace para redirigir al formulario de inicio de sesión -->
        <p class="mt-3">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
      </div>
      <div class="form-group">
        <?php 
          include("registrar.php")
        ?>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
