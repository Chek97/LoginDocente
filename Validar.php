<?php 

	$conexion = mysqli_connect("localhost", "profesor", "profesor1", "practica");

	$usuario = $_POST["login"];
	$contraseña = $_POST["password"];
	$correo = $_POST["email"];

	$firmaDigital = addslashes(file_get_contents($_FILES["firma"]["tmp_name"]));

	$consulta = "SELECT * FROM login WHERE usuario='$usuario'";

	$resultado = mysqli_query($conexion, $consulta);

	$fila = mysqli_fetch_row($resultado);

	if($fila[0]==$usuario){
		if($fila[1]==$contraseña){
			if($fila[2]==$correo){
				/*
				if($fila[3]==$firmaDigital){
					echo "Bienvenido " . $usuario;

				}else{
					echo "No estas logeado 3";
				}

				*/
				header("location: PerfilDocente.html");

				mysqli_close($conexion);

			}else{
				echo "No estas logeado 2";
			}

		}else{
			echo "No estas logeado 1";
		}

	}else{
		echo "No estas logeado 0";
	}

 ?>