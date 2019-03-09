<?php 
	$conexion = mysqli_connect("localhost", "profesor", "profesor1", "practica");

	$titulo = $_POST["tema"];
	$descripcion = $_POST["descripcion"];
	$fecha = $_POST["fecha"];

	$integrante = $_POST["campo"];

	$consulta="INSERT INTO acta VALUES('$titulo','$descripcion','$fecha')";

	$ejecutar=mysqli_query($conexion, $consulta);

	if($ejecutar){

		$consulta1 = "SELECT * FROM login";
		$ejecutar1 = mysqli_query($conexion, $consulta1);

		$fila = mysqli_fetch_row($ejecutar1);

		while ($fila) {
			if($fila['usuario'] != $integrante){
			echo "<script>alert('Los profesores que introduciste no estan registrados');</script>";

		}
		}


		/*
		else{

			$consulta2 = "SELECT * FROM acta WHERE titulo='$titulo'";
			$ejecutar2 = mysqli_query($conexion, $consulta2);

			$fila1 = mysqli_fetch_row($ejecutar2);

		}

		//sdasd

		$valor1 = $fila[0];
		$valor2 = $fila1[0];

		$consulta3 = "INSERT INTO integrantes VALUES('','$valor1','$valor2')";

		$ejecutar3 = mysqli_query($conexion, $consulta3);

		echo "Los datos se insertaron";
		*/

	}else{
		echo "Algo paso que no ocurrio nada";
	}

	mysqli_close($conexion);

	/*

	Primero consulta al acta y el login
	consulta id de cada uno

	capturar los ids en variables

	insert para guardarlos en la tabla intermedia


   */






 ?>