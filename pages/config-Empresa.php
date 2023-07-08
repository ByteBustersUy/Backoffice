<?php
require "../src/utils/validators/roles/isAdmin.php";
if (!$isAdmin) {
    header("Location:./login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Config empresa</title>
</head>

<body>
    <div>
        <div class="link-profiles-div">
            <?php
            require "./components/profiles.php";
            echo $profiles;
            ?>
        </div>
        <h1>CONFIGURACION DE EMPRESA</h1>
    </div>
    <div class="container frame">
        <div class="row">
            <div class="col-lg-8">
                <form class="form-emp" action="../src/modules/settings/config.php" method="post">
                    <div class="div-form-emp">
                        <input type="text" name="nombre" placeholder="Nombre" required autocomplete="off">
                        <input type="text" name="rubro" placeholder="Rubro" required autocomplete="off">
                        <input type="text" name="ciudad" placeholder="Ciudad" required autocomplete="off">
                        <input type="number" name="numero" placeholder="Numero" required autocomplete="off">
                        <input type="text" name="calle" placeholder="Calle" required autocomplete="off">
                        <input type="text" name="logo" placeholder="Url de logo" required autocomplete="off">
                    </div>
                    <div class="div-form-emp">
                        <input type="text" name="telefono" placeholder="Telefono" required autocomplete="off">
                        <input type="text" name="instagram" placeholder="Instagram" required autocomplete="off">
                        <input type="text" name="whatsapp" placeholder="Whatsapp" required autocomplete="off">
                        <input type="emial" name="email" placeholder="Email" required autocomplete="off">
                        <input type="text" name="pwd_email" placeholder="contraseña de email" required autocomplete="off">
                        <input type="text" name="comentario" placeholder="Comentario" required autocomplete="off">
                    </div>
                    <div class="buttons btn-emp">
                        <button type="button">APLICAR</button>
                        <button type="submit">ACEPTAR</button>
                        <button type="reset">CANCELAR</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="data-emp">
                    <img src="../assets/logo-bytebusters.png" alt="Logo de empresa" class="img-empresa">
                    <?php

                    ?>
                </div>
            </div>
            <hr class="separator">
            <?php
            require "./components/footer.php";
            echo $footer;
            ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>