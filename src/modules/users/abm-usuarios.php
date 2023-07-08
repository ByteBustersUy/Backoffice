<?php
require realpath(dirname(__FILE__))."/../../utils/validators/roles/isAdmin.php";

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
        die("alguna propiedad del formulario no tiene data. ");
    }
    
    $newUser = [
        "nombre" => $nombre,
        "apellido" => $apellido, 
        "cedula" => $cedula, 
        "email" =>$email, 
        "pass" => $pass, 
        "rolesId" => [$rolesId]
    ];
    saveOneUser($newUser);
    header("Location:../../../pages/abm-usuarios.php");
}

function hashPass(string $pass): string
{
    return password_hash($pass, PASSWORD_DEFAULT);
}

function getUserRoles(string $ci): array 
{
    return findRoles($ci);
}

function getAllUsers(): array 
{
    return findAllUsers();
}
