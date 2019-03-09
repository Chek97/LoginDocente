<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Administrador</title>
	<meta name = "viewport" content="width=device-width, user-scalable=no, initial-escale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="login.css">
</head>
<body bgcolor="#000">

	<center>
		<div class="jumbotron boxlogin">
				<h2>Administrador</h2>	
				<form method="POST" action="conectarAdm.php">
					<div class="form-group">
						<label>Usuario:</label>
						<input type="text" name="usuario" class="form-control">
					</div>
					<div class="form-group">
						<label>Contraseña</label>
						<input type="password" name="contraseña" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" value="Ingresar" class="btn btn-primary" name="login">
					</div>

				</form>

		</div>

	</center>

</body>
</html>