<?php
require '../../utils/validators/hasData.php';
if (!$_POST) {
    header("Location:../../../index.php");
    exit;
}

$userCi = $_POST['ci'];
$pass = $_POST['pass'];

if (!hasData($userCi) || !hasData($pass)) {
    header("Location:../../../index.php");
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

$hashedPass = $reg['pass'];

if (passVerify($pass, $hashedPass)) {

    session_start();
    $_SESSION['userName'] = $reg['nombre'];
    $_SESSION['userCi'] = $reg['ci'];
    $_SESSION['userRoles'] = $roles;

    if (!hasData($_SESSION['userRoles'][0])) {
        //error. usuario no tiene rol asignado
    }
    
    header("Location:../../../pages/menu-admin.php");
    exit;
} else {
    echo "<h1>holaaa</h1>";
    //header("Location:../../../index.php");
    exit;
}



function login(string $userCi, string $pass): array
{
    require '../../utils/validators/isValidPass.php';
    require '../../utils/validators/isValidUserName.php';
    require '../../repository/auth/loguear.repository.php';
    include '../../utils/messages/msg.php';

    if (!isValidUserName($userCi)) {
        header("Location:../../../index.php");
        exit;
    }

    if (!isValidPass($pass)) {
        header("Location:../../../index.php");
        exit;
    }

    $reg = findOneUser($userCi);

    if (!$reg) {
        header("Location:../../../index.php");
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
