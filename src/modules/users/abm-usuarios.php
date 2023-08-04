<?php
require realpath(dirname(__FILE__)) . "/../../utils/validators/hasData.php";
require realpath(dirname(__FILE__)) . "/../../utils/validators/isValidPass.php";
require realpath(dirname(__FILE__)) . "/../../utils/validators/isValidEmail.php";
require realpath(dirname(__FILE__)) . "/../../utils/validators/db_types.php";
require realpath(dirname(__FILE__)) . "/../../utils/messages/msg.php";
require realpath(dirname(__FILE__)) . "/../../repository/users.repository.php";


if ($_POST) {
    try {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $email = $_POST['email'];
        $pass = $_POST['contrasenia'];
        $rolesId = [];

        if (isset($_POST['check-admin'])) {
            array_push($rolesId, $_POST['check-admin']);
        }
        if (isset($_POST['check-vendedor'])) {
            array_push($rolesId, $_POST['check-vendedor']);
        }
    } catch (Exception $e) {
        throw new ErrorException($e->getMessage());
    }

    if (!elementsHasData([$nombre, $apellido, $cedula, $email, $pass, $rolesId])) {
        die("ERROR: " . $error_messages['!form_data']);
    }

    if (!isValidEmail($email)) {
        die("ERROR: " . $error_messages['!valid_email']);
    }

    if (isValidPass($pass)) {
        $pass = hashPass($pass);
    } else {
        die("ERROR: " . $error_messages['!valid_pass']);
    }

    if (!varchar45($nombre) || !varchar45($apellido) || !varchar45($email)) {
        die("ERROR: " . $error_messages['!valid_length45']);
    }

    $newUser = [
        "nombre" => $nombre,
        "apellido" => $apellido,
        "cedula" => $cedula,
        "email" => $email,
        "pass" => $pass,
        "rolesId" => $rolesId
    ];

    $userExist = findOneUser($newUser['cedula']);
    if ($userExist) {
        die("ERROR: " . $error_messages['exist_user'] . ". ('" . $userExist['ci'] . "')");
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
        foreach ($rolesList[1] as $rol) {
            $roles .= ' ' . $rol . ' |';
        }
        $usersList .= '
                        <tr class="user-select-none align-middle">
                            <td class="first-in-table">' . $user['nombre'] . ' ' . $user['apellido'] . '</td>
                            <td>' . $user['ci'] . '</td>
                            <td>' . $user['email'] . '</td>
                            <td>' . $roles . '</td>
                        </tr>';
    }
    return $usersList;
}
