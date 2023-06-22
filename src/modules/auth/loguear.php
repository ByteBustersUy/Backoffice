<?php

if (!$_POST) header("Location:../../../index.php");

$email = $_POST['user'];
$email = htmlspecialchars($email);
$email = trim($email);

$pass = $_POST['pass'];
$pass = htmlspecialchars($pass);

$reg = login($email, $pass);

if(!$reg){
    header("Location:../../pages/login.php");
}

session_start();

$_SESSION['user'] = "pepe";
$_SESSION['roles'] = ["admin"];

echo $_SESSION['user'];


function login($email, $pass)
{
    require '../../utils/validators/hasData.php';
    require '../../utils/validators/isValidPass.php';
    require '../../repository/auth/loguear.repository.php';
    include '../../utils/messages/msg.php';

    if (!hasData($email) || !hasData($pass)) {
        header("Location:../../../index.php");
    }

    if (!isValidPass($pass)) {
        header("Location:../../../index.php");
    }

    $reg = findOneUser($email, $pass);

    if (!$reg) {
        header("Location:../../../index.php");
    }

    return $reg;
}
