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
        <div class="col-lg-6">
                <div class="data-emp">
                    <img src="../assets/logo-empresa.png" alt="Logo de empresa" class="img-empresa">
                    <?php
                    require "../src/modules/settings/config.php";
                    echo getLabelsEmpresaHTML();
                    ?>
                </div>
            </div>
            <div class="col-lg-6 center">
                <form class="form-emp" action="../src/modules/settings/config.php" method="post">
                    <div>
                        <input type="text" name="nombre" placeholder="Nombre" autocomplete="off">
                        <input type="text" name="rubro" placeholder="Rubro" autocomplete="off">
                        <input type="text" name="calle" placeholder="Calle" autocomplete="off">
                        <input type="number" name="numero" placeholder="Numero" autocomplete="off">
                        <input type="text" name="ciudad" placeholder="Ciudad" autocomplete="off">
                        <input type="text" name="telefono" placeholder="Telefono" autocomplete="off">
                        <div class="buttons align-end">
                            <button class="btn-emp" type="submit">ACEPTAR</button>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="instagram" placeholder="Instagram" autocomplete="off">
                        <input type="text" name="whatsapp" placeholder="Whatsapp" autocomplete="off">
                        <input type="emial" name="email" placeholder="Email" autocomplete="off">
                        <input type="text" name="pwd_email" placeholder="contraseña de email" autocomplete="off">
                        <input type="text" name="comentario" placeholder="Comentario" autocomplete="off">
                        <input type="text" name="logo" placeholder="Url de logo" autocomplete="off">
                        <div class="buttons">
                            <button class="btn-emp" type="reset">CANCELAR</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            require "./components/footer.php";
            echo $footer;
            ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>