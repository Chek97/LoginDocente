<?php
		$db_host="localhost";
		$db_nombre="practica";
		$db_usuario="profesor";
		$db_contraseña="profesor1";

		$conexion= mysqli_connect($db_host, $db_usuario, $db_contraseña, $db_nombre);
	

	$user = $_POST["usuario"];
	$pass = $_POST["contraseña"];

	$consulta = "SELECT * FROM administrador WHERE usuario='$user'";

	$resultado = mysqli_query($conexion, $consulta);

	$fila = mysqli_fetch_row($resultado);

	if($fila[0]==$user){
		if($fila[1]==$pass){
			header("location: agregar.html");
		}else{
			header("location: ValidarAdm.php");
			
		}
	}else{
		header("location: ValidarAdm.php");
		
	}

	mysqli_close($conexion);


 ?>