<?php 
	
	class Registros {
	    private $conexion;

	    function __construct() {
	        try {
	            $this->conexion = new PDO('mysql:host=localhost; dbname=prueba', 'root', '', array(
	                PDO::ATTR_PERSISTENT => true

	            ));

	            //showMensaje("conexion exitosa");
	        } catch (Exception $e) {
	            showMensaje("Error " . $e->getMessage() . "\n");
	        }
	    }

	    // Destructor para cerrar la conexión cuando la instancia se destruye
	    function __destruct() {
	        $this->conexion = null;
	    }
	    
	    function consulta($columna, $posicion = null) {
	    	// lo que es $columna reciba el nombre de la columna no el numero de la columna
	        try {
		        if (!empty($posicion)) {
		            // Si se proporciona una posición (ID de usuario), consulta solo ese usuario
		            $sql = $this->conexion->prepare("SELECT $columna FROM usuarios WHERE id = :posicion");
		            $sql->bindParam(':posicion', $posicion, PDO::PARAM_INT);
		        } else {
		            // Si no se proporciona una posición, consulta todos los usuarios
		            $sql = $this->conexion->prepare("SELECT $columna FROM usuarios");
		        }

		        $sql->execute();

		        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);

		        return $resultado;
	            if ($sql->rowCount() > 0) {
	                //showMensaje("Si existen datos");
	                return $resultado;

	            } else {
	                //showMensaje("No hay usuarios registrados");
	                return array();
	            
	            }
	        } catch (Exception $e) {
	            //showMensaje("Error " . $e->getMessage());
	            return array();

	        }

	    }


		function registrar($nombres, $apellidos, $genero, $email, $dni, $contrasena) {
		    try {
		        $sql = $this->conexion->prepare("INSERT INTO usuarios (dni, usuario, contrasena, correo, sexo)
		            VALUES (:dni, :usuario, :contrasena, :correo, :sexo)");
		        
		        $sql->bindParam(':dni', $dni);
		        $sql->bindParam(':usuario', $nombres); // Asumo que "usuario" es el campo de nombres
		        $sql->bindParam(':contrasena', $contrasena);
		        $sql->bindParam(':correo', $email); // Cambio "correo" por "email" para ser coherente
		        $sql->bindParam(":sexo", $genero);
		        
		        // Ejecución del código y envío a la BD
		        if ($sql->execute()) {
		            return true; // Éxito en la inserción
		        } else {
		            return false; // Fallo en la inserción
		        }
		    } catch (Exception $e) {
		        echo ("Error " . $e->getMessage());
		        return false; // Fallo en la inserción debido a una excepción
		    }
		} // function registrar()

		function modificacion($id, $usuario, $genero, $email, $dni, $contrasena) {			

		    $sql = $this->conexion->prepare("UPDATE usuarios SET dni = :dni, usuario = :usuario, contrasena = :contrasena, correo = :correo WHERE id = :id");

		    $sql->bindParam(':id', $id);
		    $sql->bindParam(':dni', $dni);
		    $sql->bindParam(':usuario', $usuario);
		    $sql->bindParam(':contrasena', $contrasena);
		    $sql->bindParam(':correo', $email); // Corregido para que coincida con el nombre del parámetro y la variable

		    $sql->execute();
		}

		function eliminacion($id) {
			try {
				$sql = $this->conexion->prepare("DELETE FROM usuarios WHERE id = :id");
				$sql->bindParam(':id', $id);
				$sql->execute();
			} catch (PDOException $e) {
				echo "No se pudo eliminar el usuario" . $e->getMessage(); 
			}
		}

	}


 ?>