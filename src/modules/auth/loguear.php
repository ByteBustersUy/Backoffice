<?php
require '../../utils/validators/hasData.php';
if (!$_POST) header("Location:../../../index.php");

session_start();

$userName = $_POST['ci'];
$pass = $_POST['pass'];

if (!hasData($userName) || !hasData($pass)) {
    header("Location:../../../pages/login.php");
}

$userName = htmlspecialchars($userName);
$userName = trim($userName);
$pass = htmlspecialchars($pass);

$reg = login($userName, $pass);

if (!$reg) {
    header("Location:../../../pages/login.php");
}

if (!hasData($reg['ci'])) {
    header("Location:../../../pages/login.php");
}
$_SESSION['userCi'] = $reg['ci'];

//$roles = getUserRoles($reg['ci']);
$_SESSION['userRol'] = 'admin'; //$reg['rol'];

header("Location:../../../index.php");



function login(string $userName, string $pass): array
{
    require '../../utils/validators/isValidPass.php';
    require '../../utils/validators/isValidUserName.php';
    require '../../repository/auth/loguear.repository.php';
    include '../../utils/messages/msg.php';

    if (!isValidUserName($userName))
        header("Location:../../../index.php");

    if (!isValidPass($pass))
        header("Location:../../../index.php");

    $reg = findOneUser($userName, $pass);

    if (!$reg)
        header("Location:../../../index.php");

    return $reg;
}

function getUserRoles(string $ci): array
{
    $reg = findRolesByUserCi($ci);
    return [];
}