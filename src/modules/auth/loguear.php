<?php
require '../../utils/validators/hasData.php';
if (!$_POST) header("Location:../../../index.php");

$userName = $_POST['ci'];
$pass = $_POST['pass'];

if (hasData($userName) && hasData($pass)) {
    $userName = htmlspecialchars($userName);
    $pass = htmlspecialchars($pass);
    $userName = trim($userName);
    $reg = login($userName, $pass);
} else {
    header("Location:../../../index.php");
}

if (!$reg) {
    header("Location:../../../pages/login.php");
} else {
    session_start();

    if (hasData($reg['ci'])){
        $_SESSION['user'] = $reg['ci'];
    }
    
    header("Location:../../../index.php");
        
}

function login($userName, $pass)
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
