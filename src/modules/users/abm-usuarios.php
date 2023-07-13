<?php
require realpath(dirname(__FILE__)) . "/../../utils/validators/roles/isAdmin.php";

if (!$isAdmin) {
    header("Location:../../../pages/login.php");
    exit;
}

require realpath(dirname(__FILE__)) . "/../../utils/validators/hasData.php";

if ($_POST) {
    try {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $email = $_POST['email'];
        $pass = hashPass($_POST['contrasenia']);

        $rolesId = [];
        if (isset($_POST['check-admin'])) {
            array_push($rolesId, $_POST['check-admin']);
        }
        if (isset($_POST['check-vendedor'])) {
            array_push($rolesId, $_POST['check-vendedor']);
        }
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
        "email" => $email,
        "pass" => $pass,
        "rolesId" => $rolesId
    ];

    require "../../repository/users.repository.php";
    $userExist = findOneUser($newUser['cedula']);
    if ($userExist) {
        die("ERROR: El usuario que intentas agregar ya existe");
    }
    saveOneUser($newUser);
    header("Location:../../../pages/abm-usuarios.php");
}

function hashPass(string $pass): string
{
    return password_hash($pass, PASSWORD_DEFAULT);
}

function getUsersTableDataHTML(): string
{
    $usersData = findAllUsers();
    $usersList = '';
    foreach ($usersData as $user) {
        $rolesList = findRoles($user['ci']);
        $roles = '| ';
        foreach ($rolesList as $rol) {
            $roles .= ' ' . $rol . ' |';
        }
        $usersList .= '
                            <tr">
                                <td class="first-in-table"><a href="?ci=' . $user['ci'] . '">' . $user['nombre'] . ' ' . $user['apellido'] . '</a></td>
                                <td><a href="?ci=' . $user['ci'] . '">' . $user['ci'] . '</a></td>
                                <td><a href="?ci=' . $user['ci'] . '">' . $user['email'] . '</a></td>
                                <td><a href="?ci=' . $user['ci'] . '">' . $roles . '</a></td>
                            </tr>';
    }
    return $usersList;
}
