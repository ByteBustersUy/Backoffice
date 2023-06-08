<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Login</title>
</head>

<body class="body-login">
    <form class="form-login" action="./src/modules/auth/loguear.php" method="post">
        <img class="img-login" src="./assets/login-image.png" alt="Logo de persona para login">
        <label>
            <i class="fa-solid fa-user"></i>
            <input type="text" name="user" placeholder="Usuario" required autocomplete="off">
        </label>
        <label>
            <i class="fa-solid fa-key"></i>
            <input type="password" name="pass" placeholder="Contraseña" required autocomplete="off">
        </label>
        <a href="">Olvidaste tu contraseña?</a>
        <input class="btnsubmit" type="submit" value="Iniciar sesión">
    </form>
</body>
<footer>
        <img src="./assets/logo_bytebusters.png" alt="Logotipo de ByteBusters">
        <p class="copyright">&copy; Copyright 2023. All Rights Reserved.</p>
    </footer>
</html>