<?php
require '../../utils/validators/hasData.php';
if (!$_POST) {
    try {
        header("Location:../../../index.php");
    } catch (Exception $e) {
        header("HTTP/1.0 404 NOT FOUND");
    }
    exit;
}

$userCi = $_POST['ci'];
$pass = $_POST['pass'];

if (!hasData($userCi) || !hasData($pass)) {
    try {
        header("Location:../../../index.php");
    } catch (Exception $e) {
        header("HTTP/1.0 404 NOT FOUND");
    }
    exit;
}

$userCi = htmlspecialchars($userCi);
$userCi = trim($userCi);
$pass = htmlspecialchars($pass);

$reg = login($userCi, $pass);
$roles = getUserRoles($reg['ci']);


if (!hasData($reg['pass'])) {
    //error. no existe contraseña en base de datos
}

if (!hasData($_SESSION['userRoles'][0])) {
    //error. usuario no tiene rol asignado
}

$hashedPass = $reg['pass'];

if (passVerify($pass, $hashedPass)) {
    session_start();
    $_SESSION['userName'] = $reg['nombre'];
    $_SESSION['userCi'] = $reg['ci'];
    $_SESSION['userRoles'] = $roles;

    try {
        header("Location:../../../pages/menu-admin.php");
    } catch (Exception $e) {
        header("HTTP/1.0 404 NOT FOUND");
    }
    exit;
} else {
    try {
        header("Location:../../../index.php");
    } catch (Exception $e) {
        header("HTTP/1.0 404 NOT FOUND");
    }
    exit;
}



function login(string $userCi, string $pass): array
{
    require '../../utils/validators/isValidPass.php';
    require '../../utils/validators/isValidUserName.php';
    require '../../repository/auth/loguear.repository.php';
    include '../../utils/messages/msg.php';

    if (!isValidUserName($userCi)) {
        try {
            header("Location:../../../index.php");
        } catch (Exception $e) {
            header("HTTP/1.0 404 NOT FOUND");
        }
        exit;
    }

    if (!isValidPass($pass)) {
        try {
            header("Location:../../../index.php");
        } catch (Exception $e) {
            header("HTTP/1.0 404 NOT FOUND");
        }
        exit;
    }

    $reg = findOneUser($userCi, $pass);

    if (!$reg) {
        try {
            header("Location:../../../index.php");
        } catch (Exception $e) {
            header("HTTP/1.0 404 NOT FOUND");
        }
        exit;
    }

    return $reg;
}

function getUserRoles(string $ci): array
{
    $roles = findRolesByUserCi($ci);
    return $roles;
}

function hashpass(string $pass): string
{
    //return sha1($pass);
    return password_hash($pass, PASSWORD_DEFAULT);
}

function passVerify(string $pass, string $hashedPass): bool
{
    return password_verify($pass, $hashedPass);
}
