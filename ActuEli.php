<?php 


	$conexion = mysqli_connect("localhost", "profesor", "profesor1", "practica");


	if (isset($_POST["Act"])) {
		
		$valor = $_POST["acta"];

		$titulo = $_POST["tema"];
		$fecha = $_POST["fecha"];
		$descripcion = $_POST["descripcion"];

		$consulta = "UPDATE acta SET titulo='$titulo',descripcion='$descripcion',fecha='$fecha' WHERE titulo='$valor'";

		$ejecutar = mysqli_query($conexion, $consulta);

		if($ejecutar){
			header("location: mostrarActas.php");
		}else{
			echo "Algo no salio bien";
		}

	}

	if (isset($_POST["Elim"])) {
		
		$valor = $_POST["acta"];

		$consulta1 = "DELETE FROM acta WHERE titulo='$valor'";

		$ejecutar1 = mysqli_query($conexion, $consulta1);

		if($ejecutar1){
			header("location: mostrarActas.php");
		}else{
			echo "Creo que no salio bien";
		}
	}
	




	/*function actualizar($titulo, $descripcion1, $fecha1, $integrante){

		$consulta = "UPDATE SET titulo='$titulo', descripcion='$descripcion1', fecha='$fecha1', integrantes='$integrante' WHERE "

	}

*/





 ?>