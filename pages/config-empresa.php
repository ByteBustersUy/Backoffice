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
        <div class="link-options-div">
            <?php
            require "./components/options.php";
            echo $options;
            ?>
        </div>
        <h1>CONFIGURACION DE EMPRESA</h1>
    </div>
    <div class="container frame">
        <div class="row">
            <div class="col-xl-8 center">
                <form class="form-emp" action="../src/modules/settings/config.php" method="post">
                    <div>
                        <label>Nombre:<input type="text" name="nombre" placeholder="ej: Digital Market" autocomplete="off"></label>
                        <label>Rubro:<input type="text" name="rubro" placeholder="ej: Supermercado" autocomplete="off"></label>
                        <label>Calle:<input type="text" name="calle" placeholder="ej: Giannasstassio" autocomplete="off"></label>
                        <label>Número:<input type="number" name="numero" placeholder="ej: 102" autocomplete="off"></label>
                    </div>
                    <div>
                        <label>Ciudad:<input type="text" name="ciudad" placeholder="ej: Solymar" autocomplete="off"></label>
                        <label>Teléfono:<input type="text" name="telefono" placeholder="ej: 26961234" autocomplete="off"></label>
                        <label>Instagram:<input type="text" name="instagram" placeholder="@digital.market" autocomplete="off"></label>
                        <label>Whatsapp:<input type="text" name="whatsapp" placeholder="+59896123456" autocomplete="off"></label>
                    </div>
                    <div>
                        <label>Email:<input type="emial" name="email" placeholder="ej: dmarket@gmail.com" autocomplete="off"></label>
                        <label>Contraseña de email:<input type="text" name="pwd_email" placeholder="ej: 1234DIGITAL" autocomplete="off"></label>
                        <label>Comentario de venta:<input type="text" name="comentario" placeholder="ej: precios en pesos Uruguayos" autocomplete="off"></label>
                        <label>Url logo empresa:<input type="text" name="logo" placeholder="ej: drive.com/logo.png" autocomplete="off"></label>
                    </div>
                    <div class="buttons absolute bottom-10">
                        <button class="btn-emp" type="submit">ACEPTAR</button>
                        <button class="btn-emp" type="reset">CANCELAR</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-4">
                <div class="data-emp">
                    <img src="../assets/logo-empresa.png" alt="Logo de empresa" class="img-empresa">
                    <?php
                    require "../src/modules/settings/config.php";
                    echo getLabelsEmpresaHTML();
                    ?>
                </div>
            </div>
            <div>
                <?php
                require "./components/footer.php";
                echo $footer;
                ?>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>