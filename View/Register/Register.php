<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../Includes/header.php'); ?>
    <title>Registro | Login Docente 8</title>
</head>
<body>
    <div>
        <?php include('../Includes/message.php'); ?>
        <header>
            <h1>Registro Usuario</h1>
        </header>
        <form action="../../Controller/User/UserController.php?act='create'" enctype="multipart/form-data" method="POST">
            <h2>Nuevo Usuario</h2>
            <div>
                <input type="text" placeholder="Nombre" name="name">
                <p id="name"></p>
            </div>
            <div>
                <input type="text" placeholder="Apellido" name="last_name">
            </div>
            <div>
                <input type="text" placeholder="Usuario" name="username">
                <p id="username"></p>
            </div>
            <div>
                <input type="email" placeholder="Correo Electronico" name="email">
                <p id="email"></p>
            </div>
            <div>
                <input type="password" placeholder="Contraseña" name="password">
                <p id="password"></p>
            </div>
            <div>
                <input type="file" placeholder="Firma Digital" name="firm">
                <p id="firm"></p>
            </div>
            <div>
                <button type="submit" name="submit_user" id="submitUser">
                    Crear Usuario
                </button>
            </div>
            <p>
                Ya tienes una cuenta? <a href="../Login/Login.php">Inicia sesion</a>
            </p>
        </form>
    </div>
    <?php require_once('../Includes/footer.php'); ?>
    <script src="../../Public/js/formValidator.js"></script>
</body>

</html>