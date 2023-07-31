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
        <div class="link-options-div">
            <?php
            require "./components/options.php";
            echo $options;
            ?>
        </div>
        <h1>GESTIÓN DE USUARIOS</h1>
    </div>
    <div class="container frame">
        <div class="row">
            <div class="col-lg-2 ">
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
            <div class="col-lg-7">
                <div class="table-options">
                    <input type="search" name="search" placeholder="Nombre" autocomplete="off">
                    <button type="button">Buscar</button>
                    <select class="order-list" name="order" id="order">
                        <option selected hidden value="">Ordenar</option>
                        <option value="az">A-Z</option>
                        <option value="za">Z-A</option>
                    </select>
                    <select class="filter-list" name="filter" id="filter">
                        <option selected hidden value="">Filtrar</option>
                        <option value="admin">Administradores</option>
                        <option value="vendedor">Vendedores</option>
                    </select>
                </div>
                <div class="table-frame">
                    <table class="table table-dark table-hover">
                        <thead class="sticky-top">
                            <tr>
                                <th class="first-in-table" scope="col">Nombre completo</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require "../src/modules/users/abm-usuarios.php";
                            echo getUsersTableDataHTML();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3">
                <form class="form-abm" action="../src/modules/users/abm-usuarios.php" method="post">
                    <input type="text" name="nombre" placeholder="Nombre" required autocomplete="off">
                    <input type="text" name="apellido" placeholder="Apellido" required autocomplete="off">
                    <input type="text" name="cedula" placeholder="Cédula de identidad" required autocomplete="off">
                    <input type="text" name="email" placeholder="Email" required autocomplete="off">
                    <input type="text" name="contrasenia" placeholder="Contraseña" required autocomplete="off">
                    <div class="d-flex center">
                        <div class="chkbox-div">
                            <label class="chkbox-labels" for="check-admin">Administrador</label>
                            <input class="chkbox-roles" type="checkbox" name="check-admin" id="check-admin" value="1">
                        </div>
                        <div class="chkbox-div">
                            <label class="chkbox-labels" for="check-vendedor">Vendedor</label>
                            <input class="chkbox-roles" type="checkbox" name="check-vendedor" id="check-vendedor" value="2">
                        </div>
                    </div>
                    <div class="buttons">
                        <button type="submit">ACEPTAR</button>
                        <button type="reset">CANCELAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <?php
        require "./components/footer.php";
        echo $footer;
        ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>