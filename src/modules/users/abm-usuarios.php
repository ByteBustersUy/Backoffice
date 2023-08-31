<?php
require realpath(dirname(__FILE__)) . "/../../utils/validators/hasData.php";
require realpath(dirname(__FILE__)) . "/../../utils/validators/isValidPass.php";
require realpath(dirname(__FILE__)) . "/../../utils/validators/isValidEmail.php";
require realpath(dirname(__FILE__)) . "/../../utils/validators/db_types.php";
require realpath(dirname(__FILE__)) . "/../../repository/users.repository.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_status() === PHP_SESSION_ACTIVE ?: session_start();

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "add") {
            addUser();
        } else if ($_GET['action'] == "edit" && isset($_GET['ci'])) {
            editUser($_GET['ci']);
        } else if ($_GET['action'] == "delete") {
            if ($_POST["deleteUserCi"] != $_SESSION['userCi']) {
                return deleteUser($_POST["deleteUserCi"]);
            }
        } else {
            die("Invalid action requested");
        }
    }
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
                        <tr id="' . $user['ci'] . '" class="align-middle" onclick="selectUserRow(' . $user['ci'] . ')">
                            <td class="user-select-none first-in-table">' . $user['nombre'] . ' ' . $user['apellido'] . '</td>
                            <td>' . $user['ci'] . '</td>
                            <td class="user-select-none">' . $user['email'] . '</td>
                            <td class="user-select-none">' . $roles . '</td>
                        </tr>';
    }
    return $usersList;
}

function addUser()
{
    require realpath(dirname(__FILE__)) . "/../../utils/messages/msg.php";

    try {
        $nombre = htmlspecialchars($_POST['nombre']);
        $apellido = htmlspecialchars($_POST['apellido']);
        $cedula = htmlspecialchars($_POST['cedula']);
        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['contrasenia']);
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
    } //TODO: check

    if (!isValidEmail($email)) {
        die("ERROR: " . $error_messages['!valid_email']);
    }

    if (isValidPass($pass)) {
        $pass = hashPass($pass);
    } else {
        die("ERROR: " . $error_messages['!valid_pass']);
    }

    if (!varchar45($nombre . $apellido) || !varchar45($email)) {
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


function editUser(string $userCi)
{
    require realpath(dirname(__FILE__)) . "/../../utils/messages/msg.php";
    try {
        if (isset($_POST['cedula']) || isset($_POST['contrasenia'])) {
            die("ERROR: Invalid request");
        }

        $nombre = htmlspecialchars($_POST['nombre']);
        $apellido = htmlspecialchars($_POST['apellido']);
        $email = htmlspecialchars($_POST['email']);
        $rolesId = [];

        if (isset($_POST['check-admin'])) {
            array_push($rolesId, htmlspecialchars($_POST['check-admin']));
        }
        if (isset($_POST['check-vendedor'])) {
            array_push($rolesId, htmlspecialchars($_POST['check-vendedor']));
        }

        if (!varchar45($nombre) || !varchar45($apellido) || !varchar45($email)) {
            die("ERROR: " . $error_messages['!valid_length45']);
        }

        if (count($rolesId) == 0) {
            throw new Error("ERROR: " . $error_messages['!rolesSelected']);
        }

        $data = [$nombre, $apellido, $email, $rolesId];

        foreach ($data as $element) {
            if (is_string($element) && preg_match('/(^\s+$)|(^\s+)|(\s+$)/', $element)) {
                die("ERROR: " . $error_messages['!valid_chars']);
            }
        }

        if (!elementsHasData($data)) {
            die("ERROR: " . $error_messages['!form_data']);
        }

        if (!elementsHasData([$nombre, $apellido, $email, $rolesId])) {
            die("ERROR: " . $error_messages['!form_data']);
        }

        $userExist = findOneUser(htmlspecialchars($userCi));
        if (!$userExist) {
            die("ERROR: " . $error_messages['!exist_user'] . ". ('" . $userExist['ci'] . "')");
        }

        $newUser = [
            "nombre" => $nombre,
            "apellido" => $apellido,
            "email" => $email,
            "cedula" => $userExist['ci'],
            "rolesId" => $rolesId
        ];

        
        updateOneUser($newUser);
        header("Location:../../../pages/abm-usuarios.php");

    } catch (Exception $e) {
        throw new ErrorException($e->getMessage());
    }
}
