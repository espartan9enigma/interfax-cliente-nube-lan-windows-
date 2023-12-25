<?php
    require("conexion.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
            $usuario = $_POST['usuario'];
            $contra = $_POST['contra'];

            $sql = "SELECT Id FROM usuarios WHERE usuario = :usuario AND contrasena = :contra";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->bindParam(':contra', $contra, PDO::PARAM_STR);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                // Usuario válido, puedes almacenar información en sesiones o realizar otras acciones
                $usuarioId = $resultado['Id'];
                header("Location: index_usuario.php");
                exit();
                // ... Hacer algo con los datos ...
            } else {
                // Usuario no encontrado o contraseña incorrecta
                echo "Credenciales incorrectas. <a href='login.php'>Intentar nuevamente</a>";
            }
        } catch (PDOException $e) {
            die("Error al validar datos: " . $e->getMessage());
        }
    } else {
        echo "Método no permitido. <a href='login.php'>Volver</a>";
    }
?>
