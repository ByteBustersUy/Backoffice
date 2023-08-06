<?php
require "../src/modules/auth/desloguear.php";
try {
    require "../src/db/conexion.php";
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/normalize.css">
    <link rel="icon" type="image/x-icon" href="../favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Ecommerce Manager</title>
</head>

<body>
    <form class="form-login" action="../src/modules/auth/loguear.php" method="post" autocomplete="off">
        <img class="img-login" src="../assets/login-image.png" alt="Logo de persona para login">
        <label>
            <i class="fa-solid fa-user"></i>
            <input type="text" name="ci" placeholder="Cédula de Identidad" required>
        </label>
        <label>
            <i class="fa-solid fa-key"></i>
            <input type="password" name="pass" placeholder="Contraseña" required>
        </label>
        <a href="">Olvidaste tu contraseña?</a>
        <input class="btn-submit" type="submit" value="Iniciar sesión">
    </form>
    <footer>
        <?php
        require "./components/footer.php";
        echo $footer;
        ?>
    </footer>
</body>

</html>