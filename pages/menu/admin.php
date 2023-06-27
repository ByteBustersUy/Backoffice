<?php
session_start();
if($_SESSION['userRol'] !== 'admin')
    header("location:../../index.php");

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles/style.css">
    <title>Menú Admin</title>
</head>

<body>
    <div>
        <select class="profile" name="profile" id="select-profile">
            <option value="administrador">Administrador</option>
            <option value="vendedor">Vendedor</option>
        </select>
        <h1>MENÚ PRINCIPAL</h1>
    </div>
    <div class="container frame">
        <div class="row">
            <div class="col-lg-4 justify-center">
                <div class="menu-cards">
                    <a href="../abmUsuarios.php">
                        <div>
                            <i class="fa-solid fa-users"></i>
                            <h4>GESTIÓN DE USUARIOS</h4>
                            <p>Agregar, editar o eliminar usuarios</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 justify-center">
                <div class="menu-cards">
                    <a href="">
                        <div>
                            <i class="fa-solid fa-shield"></i>
                            <h4>GESTIÓN DE PERMISOS</h4>
                            <p>Agregar, editar o eliminar permisos</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 justify-center">
                <div class="menu-cards">
                    <a href="../../src/modules/settings/config.php">
                        <div>
                            <i class="fa-solid fa-gears"></i>
                            <h4>CONFIGURACIÓN DE EMPRESA</h4>
                            <p>Agregar o editar datos de la empresa </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr class="separator">
    <footer>
        <img src="../../assets/logo_bytebusters.png" alt="Logotipo de ByteBusters">
        <p class="copyright">&copy; Copyright 2023. All Rights Reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>