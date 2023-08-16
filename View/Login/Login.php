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
        <form action="../../Controller/User/UserController.php?act=login" method="POST" enctype="multipart/form-data">
            <h2>Login</h2>
            <div>
                <input type="text" name="username" placeholder="Usuario">
                <p id="username"></p>
            </div>
            <div>
                <input type="email" name="email" placeholder="Correo Electronico">
                <p id="email"></p>
            </div>
            <div>
                <input type="password" name="password" placeholder="Contraseña">
                <p id="password"></p>
            </div>
            <div>
                <input type="file" name="firm" placeholder="Firma Digital">
                <p id="firm"></p>
            </div>
            <div>
                <button type="submit" name="login_user" id="loginUser">Iniciar Sesion</button>
            </div>
            <p>
                No tienes una cuenta todavia? <a href="../Register/Register.php">Crea una aqui</a> 
            </p>
        </form>
    </div>
    <?php require_once('../Includes/footer.php'); ?>
    <script src="../../Public/js/loginValidator.js"></script>
</body>
</html>