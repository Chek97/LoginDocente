	<?php 

	/*

		$db_host="localhost";
		$db_nombre="practica";
		$db_usuario="profesor";
		$db_contraseña="profesor1";

		$conexion= mysqli_connect($db_host,$db_usuario,$db_contraseña,$db_nombre);

		if(!$conexion){
			echo "Error al conectar";

		}

		echo "Conexion establecida";


		$usuario=$_POST["user"];
		$password=$_POST["pass"];
		$correo=$_POST["correo"];

		$consulta ="INSERT INTO profesor VALUES ('$usuario','$password','$correo')";

		$resultado = mysqli_query($conexion, $consulta);

		if($resultado){
			echo "Se logro insertar";
		}else{
			echo "No se guardaron los datos correctamente". mysqli_error($conexion);
		}

		mysqli_close($conexion);

		*/


		$conexion = mysqli_connect("localhost", "profesor", "profesor1", "practica");

		$usuario = $_POST["user"];
		$contraseña = $_POST["password"];
		$correo = $_POST["email"];

		$firmaDigital = addslashes(file_get_contents($_FILES["firma"]["tmp_name"]));

		$consulta = "INSERT INTO login VALUES('$usuario', '$contraseña', '$correo', '$firmaDigital')";

		$resultado = mysqli_query($conexion, $consulta);

		if($resultado){
			echo "Si se inserto";

		}else{
			echo "No se inserto";
		} 
		





	 ?>