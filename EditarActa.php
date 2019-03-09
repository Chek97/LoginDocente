<?php 

	$conexion = mysqli_connect("localhost", "profesor", "profesor1", "practica");


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>lorem</title>
	<meta name = "viewport" content="width=device-width, user-scalable=no, initial-escale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="login.css">
</head>
<body>
<body>

		<?php

			$indice = $_POST["valor"];

			$consulta="SELECT * FROM acta WHERE titulo='$indice'";

			$ejecutar = mysqli_query($conexion, $consulta);

			$fila = mysqli_fetch_row($ejecutar);


		 ?>
	<center>
		<div class="jumbotron1 boxlogin">
			<form action="ActuEli.php" method="POST">
				<table>
					<h2 style="margin-bottom: 20px;"><input type="text" name="acta" readonly class="cajaActa" value="<?php echo $fila[0] ?>"></h2><br>

					<tr>
						<td><label>Tema:</label></td>
						<td><input type="text" name="tema" class="form-control" value="<?php echo $fila[0] ?>"><br><br></td>
					</tr>
					<tr>
						<td><label>fecha:</label></td>
						<td><input type="date" class="form-control" name="fecha" value="<?php echo $fila[2] ?>"><br></td>
					</tr>
					<tr>
						<td><label>Descripcion:</label></td>
						<td><textarea name="descripcion" rows="3" cols="20" class="form-control" ><?php echo $fila[1] ?></textarea><br></td>
					</tr>
				</table>
				<input type="submit" value="Actualizar" name="Act" class="btn btn-primary">
				<input type="submit" value="Eliminar" name="Elim" class="btn btn-danger">
			</form>
		</div>

	</center>	 


</body>
</html>