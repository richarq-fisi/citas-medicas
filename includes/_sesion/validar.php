
  
  <?php

  /**
   * Parte de registro de usuarios
   */

    include "../db.php"; 
	if(isset($_POST)){
		if (strlen($_POST['nombre']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['password']) >= 1 
        && strlen($_POST['rol']) >= 1) {
			$nombre = trim($_POST['nombre']);
			$correo = trim($_POST['correo']);
			$password = trim($_POST['password']);
			$rol= trim($_POST['rol']);


		$consulta = "INSERT INTO user (nombre, correo,  password, rol)
			VALUES ('$nombre', '$correo', '$password', '$rol')";
		$resultado=mysqli_query($conexion, $consulta);

			if($resultado){
	echo'El registro fue guardado correctamente';
		
			}else{
				echo 'Ocurrio un error al guardar los datos';
			}
	}else{
		echo 'No data';
	}
	}






