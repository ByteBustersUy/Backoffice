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
    <title>Gestor de usuarios</title>
</head>

<body>
    <div>
        <?php
        require "./components/profiles.php";
        echo $profiles;
        ?>
        <h1>GESTIÓN DE USUARIOS</h1>
    </div>
    <div class="container frame">
        <div class="row">
            <div class="col-lg-2 d-lg-block">
                <div class="items">
                    <a href="">
                        <div class="btn-abm">
                            <i class="fa-solid fa-square-plus"></i>
                        </div>
                    </a>
                    <a href="">
                        <div class="btn-abm">
                            <i class="fa-solid fa-pen"></i>
                        </div>
                    </a>
                    <a href="">
                        <div class="btn-abm">
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-7 table-frame">
                <table class="table table-dark table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Cédula</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Thornton</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Thornton</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Thornton</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Thornton</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Thornton</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Thornton</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Jacob</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Jacob</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Jacob</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Jacob</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Jacob</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Jacob</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Jacob</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Jacob</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Jacob</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">Mark</th>
                            <td>Jacob</td>
                            <td>Otto</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3">
                <form class="form-abmUsuarios" action="" method="post">
                    <input type="text" name="nombre" placeholder="Nombre" required autocomplete="off">
                    <input type="text" name="apellido" placeholder="Apellido" required autocomplete="off">
                    <input type="text" name="cedula" placeholder="Cédula de identidad" required autocomplete="off">
                    <input type="text" name="email" placeholder="Email" required autocomplete="off">
                    <input type="text" name="contrasenia" placeholder="Contraseña" required autocomplete="off">
                    <select name="Rol" id="rol">
                        <option value="">Seleccione un rol</option>
                        <option value="1">#</option>
                        <option value="2">#</option>
                    </select>
                    <div class="buttons">
                        <button type="reset">CANCELAR</button>
                        <button type="submit">ACEPTAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr class="separator">
    <?php
    require "./components/footer.php";
    echo $footer;
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
    </script>
</body>

</html>