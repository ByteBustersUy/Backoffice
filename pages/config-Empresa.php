<?php
require "../src/utils/validators/roles/isAdmin.php";
if (!$isAdmin) {
    try {
        header("Location:./login.php");
    } catch (Exception $e) {
        header("HTTP/1.0 404 NOT FOUND");
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Config empresa</title>
</head>

<body>
    <div>
        <?php
        require "./components/profiles.php";
        echo $profiles;
        ?>
        <h1>GESTIÓN DE EMPRESA</h1>
    </div>
    <div class="container frame">
        <div class="row">
            <h2>DATOS DE LA EMPRESA</h2>

            <div class="col-8">
                <div class="forms">

                    <div>
                        <form class="form-emp" action="" method="post">
                            <input type="text" name="nombre" placeholder="Nombre" required>
                            <input type="text" name="rubro" placeholder="Rubro" required>
                            <input type="text" name="ciudad" placeholder="Ciudad" required>
                            <input type="text" name="numero" placeholder="numero" required>
                            <input type="text" name="calle" placeholder="Calle" required>


                        </form>
                    </div>
                    <div>

                        <form class="form-emp" action="" method="post">
                            <input type="text" name="telefono" placeholder="Telefono" required>
                            <input type="text" name="whatsapp" placeholder="Whatsapp" required>
                            <input type="text" name="instagram" placeholder="Instagram">
                            <input type="text" name="Comentarios" placeholder="Comentarios" required>
                            <input type="text" name="logo" placeholder="URL-" required>


                        </form>
                        <div class="buttons">
                            <button type="submit">APLICAR</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-4">
                <div class="data-emp">
                    <img src="../assets/logo-bytebusters.png" alt="Logo de empresa" class="img-empresa">

                    <form class="form-emp" action="" method="">
                        <label type="text" name=""></label>
                        <label type="text" name=""></label>
                        <label type="text" name=""></label>
                        <label type="text" name=""></label>
                        <label type="text" name="">gfdfg</label>

                        <div class="buttons">
                            <button type="submit">ACEPTAR</button>
                            <button type="reset">CANCELAR</button>
                        </div>
                        </datos>
                    </form>
                </div>
            </div>






            <hr class="separator">
            <?php
            require "./components/footer.php";
            echo $footer;
            ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
                crossorigin="anonymous"></script>
            <script>
            </script>
</body>

</html>