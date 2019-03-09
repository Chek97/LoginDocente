<?php 
	
	$conexion = mysqli_connect("localhost", "profesor", "profesor1", "practica");

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Todas Actas</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="login.css">	
</head>
<body>
	<center>
	<h2>Actas Creadas</h2>
		<table class="table">
	 		<thead>
	 			<tr>
	 				<th>Titulo</th>
	 				<th>Opcion</th>
	 			</tr>
	 		</thead>
	<?php 

		$consulta = "SELECT titulo FROM acta";

		$ejecutar = mysqli_query($conexion, $consulta);

		while ($mostrar = mysqli_fetch_array($ejecutar)) {
	?>
	 	<tr>
	 		<td>
	 			<form method="POST" action="EditarActa.php">
	 				<input type="text" name="valor" value="<?php echo $mostrar['titulo']; ?>" class="cajaActa" readonly>
	 				<td>
	 					<input type="submit" value="Editar o Eliminar" class="btn btn-success">
	 				</td>
	 			</form>
	 		</td>
	 	</tr>

	 <?php 
	 
	 }

	 mysqli_close($conexion);
	  ?>	


	 </table>
		
	</center>
</body>
</html>