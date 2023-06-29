<?php
//header("HTTP/1.0 404 NOT FOUND");
require '../../utils/validators/hasData.php';
if (!$_POST) {
    header("Location:../../../index.php");
    die();
}

session_start();

$userName = $_POST['ci'];
$pass = $_POST['pass'];

if (!hasData($userName) || !hasData($pass)) {
    header("Location:../../../pages/login.php");
    die();
}

$userName = htmlspecialchars($userName);
$userName = trim($userName);
$pass = htmlspecialchars($pass);

$reg = login($userName, $pass);

if (!$reg) {
    header("Location:../../../pages/login.php");
    die();
}

if (!hasData($reg['ci'])) {
    header("Location:../../../pages/login.php");
    die();
}

$roles = getUserRoles($reg['ci']);

$_SESSION['userCi'] = $reg['ci'];
$_SESSION['userRoles'] = $roles;

if (!hasData($reg['pass'])) {
    //error. no existe contraseña en base de datos
}

if (!hasData($_SESSION['userRoles'][0])) {
    //error. usuario no tiene rol asignado
}

$hashedPass = $reg['pass'];

if (passVerify($pass, $hashedPass)) {
    header("Location:../../../pages/menu-admin.php");
    die();
}



function login(string $userName, string $pass): array
{
    require '../../utils/validators/isValidPass.php';
    require '../../utils/validators/isValidUserName.php';
    require '../../repository/auth/loguear.repository.php';
    include '../../utils/messages/msg.php';

    if (!isValidUserName($userName)) {
        header("Location:../../../index.php");
        die();
    }

    if (!isValidPass($pass)) {
        header("Location:../../../index.php");
        die();
    }

    $reg = findOneUser($userName, $pass);

    if (!$reg) {
        header("Location:../../../index.php");
        die();
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
