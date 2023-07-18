<?php
require "../src/utils/validators/roles/isVendedor.php";
if (!$isVendedor) {
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
    <title>Menú Vendedor</title>
</head>

<body>
    <div>
        <div class="link-profiles-div">
            <?php
            require "./components/profiles.php";
            echo $profiles;
            ?>
        </div>
        <h1>MENÚ PRINCIPAL</h1>
    </div>
    <div class="container frame">
        <div class="row">
            <div class="col-lg-4 justify-center">
                <div class="menu-cards">
                    <a href="../<?php echo findPathByAction($actions["gestionar-productos"], $_SESSION['userRolesIds'])?>">
                        <div>
                            <i class="fa-solid fa-basket-shopping"></i>
                            <h4>GESTIÓN DE PRODUCTOS</h4>
                            <p>Agregar, editar o eliminar productos</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 justify-center">
                <div class="menu-cards">
                    <a href="../<?php echo findPathByAction($actions["gestionar-promociones"], $_SESSION['userRolesIds'])?>">
                        <div>
                            <i class="fa-solid fa-rectangle-ad"></i>
                            <h4>GESTIÓN DE PROMOCIONES</h4>
                            <p>Agregar, editar o eliminar promociónes</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 justify-center">
                <div class="menu-cards">
                    <a href="../<?php echo findPathByAction($actions["descargar-documentos"], $_SESSION['userRolesIds'])?>">
                        <div>
                            <i class="fa-solid fa-file-arrow-down"></i>
                            <h4>DESCARGA DE DOCUMENTOS</h4>
                            <p>Catálogo de productos e informe de ventas</p>
                        </div>
                    </a>
                </div>
            </div>
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