
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo_login.css">
</head>
<body>
    <div class="box">
        <spam class="borderLine"></spam>
        <form action="controlador.php" method="post">
            
            <h2><img class="logo" src="imagen/Captura de pantalla 2023-09-15 140605.png"></h2>
            <div class="ingresar_caja">
                
                <input type="text" required="required" name="usuario">
                <span>Usuario</span>
                <i></i>
            </div>
            <div class="ingresar_caja">
                <input type="password" required="required" name="contra">
                <span>Contraseña</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">¿Olvidaste tu contraseña?</a>
                <a href="registro.php">Registrarse</a>
            </div>
            <input type="submit" value="Ingresar" name="ingresar">
        </form>


    </div>
</body>
</html>