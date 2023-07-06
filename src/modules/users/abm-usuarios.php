<?php
require "/Applications/XAMPP/xamppfiles/htdocs/Backoffice/src/utils/validators/roles/isAdmin.php";

if (!$isAdmin) {
    header("Location:../../../pages/login.php");
    exit;
}

require realpath(dirname(__FILE__)) . "/persona.php";
require realpath(dirname(__FILE__)) . "/usuario.php";
require realpath(dirname(__FILE__)) . "/../../utils/validators/hasData.php";
if ($_POST) {
    try {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $email = $_POST['email'];
        $pass = hashPass($_POST['contrasenia']);
        $rolesId = $_POST['roles'];
    } catch (Exception $e) {
        throw new ErrorException("Error al procesar datos de formulario. >>" . $e->getMessage());
    }

    if (
        !hasData($nombre) ||
        !hasData($apellido) ||
        !hasData($cedula) ||
        !hasData($email) ||
        !hasData($pass) ||
        !hasData($rolesId)
    ) {
        die("no tiene data > ".$roles);
    }
    $newUser = new Usuario($nombre, $apellido, $cedula, $email, $pass, [$rolesId]);
    saveNewUser($newUser);
    header("Location:../../../pages/abm-usuarios.php");
}

function hashPass(string $pass): string
{
    return password_hash($pass, PASSWORD_DEFAULT);
}

function getUsersData(): array
{
    return findAllUsers();
}

function saveNewUser(object $newUser)
{
    require '../../repository/auth/users.repository.php';
    return saveOneUser($newUser);
}
