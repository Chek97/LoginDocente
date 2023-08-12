<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../Includes/header.php'); ?>
    <title>Login | Login Docente 8</title>
</head>
<body>
    <div>
        <?php include('../Includes/message.php'); ?>
        <header>
            <h1>Login Docente</h1>
        </header>
        <form action="" enctype="multipart/form-data">
            <h2>Login</h2>
            <div>
                <input type="text" placeholder="Usuario">
            </div>
            <div>
                <input type="email" placeholder="Correo Electronico">
            </div>
            <div>
                <input type="password" placeholder="Contraseña">
            </div>
            <div>
                <input type="file" placeholder="Firma Digital">
            </div>
            <div>
                <button type="submit">Iniciar Sesion</button>
            </div>
            <p>
                No tienes una cuenta todavia? <a href="../Register/Register.php">Crea una aqui</a> 
            </p>
        </form>
    </div>
    <?php require_once('../Includes/footer.php'); ?>
</body>
</html>