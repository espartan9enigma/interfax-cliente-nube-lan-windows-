<?php
require("conexion.php");

$nombre = "root";
$contrasena = "123";

if(isset($_POST['usuario']) && isset($_POST['contra'])) {
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

    // Consulta SQL para verificar las credenciales en la base de datos
    
    if ($usuario === $nombre && $contra === $contrasena) {
        // Credenciales válidas, redirige a otra página
        // Consulta SQL para verificar las credenciales en la base de datos
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :contra";

    // Prepara la consulta
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->bindParam(':contra', $contra, PDO::PARAM_STR);

    // Ejecuta la consulta
    $stmt->execute();
        header("Location: index_admin.php");
        exit();
    } else {
        // Credenciales inválidas
        echo "Credenciales inválidas";
    }
    
}
?>


        