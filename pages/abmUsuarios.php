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
        <select class="profile" name="profile" id="select-profile">
            <option value="administrador">Administrador</option>
            <option value="vendedor">Vendedor</option>
        </select>
        <h1>GESTIÓN DE USUARIOS</h1>
    </div>
    <div class="container frame">
        <div class="row">
            <div class="col-lg-2 justify-center d-sm-flex d-lg-block border-test">
                <div class="btn-abm">
                    <div class="justify-center">
                        <i class="fa-solid fa-plus"></i>
                        <h4>AGREGAR</h4>
                    </div>
                </div>
                <div class="btn-abm">
                    EDITAR
                </div>
                <div class="btn-abm">
                    ELIMINAR
                </div>
            </div>
            <div class="col-lg-6 border-test">
                listado
            </div>
            <div class="col-lg-4 border-test">
            <form class="form-abmUsuarios" action="" method="post">
                <input type="text" name="nombre" placeholder="Nombre" required autocomplete="off">
                <input type="text" name="apellido" placeholder="Apellido" required autocomplete="off">
                <input type="text" name="cedula" placeholder="Cédula de identidad" required autocomplete="off">
                <input type="text" name="email" placeholder="Email" required autocomplete="off">
                <input type="text" name="contrasenia" placeholder="Contraseña" required autocomplete="off">
                <input type="text" name="rol" placeholder="Rol" required autocomplete="off">
                <div class="buttons">
                    <button type="reset">CANCELAR</button>
                    <button type="submit">ACEPTAR</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <hr class="separator">
    <footer>
        <img src="../assets/logo_bytebusters.png" alt="Logotipo de ByteBusters">
        <p class="copyright">&copy; Copyright 2023. All Rights Reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>