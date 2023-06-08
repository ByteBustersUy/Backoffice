<?php

if (!$_POST) header("Location:../../../index.php");

$email = $_POST['user'];
$email = htmlspecialchars($email);
$email = trim($email);

$pass = $_POST['pass'];
$pass = htmlspecialchars($pass);

$result = login($email, $pass);

function login($email, $pass)
{
    require '../../utils/validators/hasData.php';
    require '../../utils/validators/isValidPass.php';
    require '../../repository/auth/loguear.repository.php';
    include '../../utils/messages/msg.php';

    if (!hasData($email) || !hasData($pass)) {
        throw new Error($error_messages['!hasData']); //TODO: mostrar solo mensaje
    }

    if (!isValidPass($pass)) {
        throw new Error($error_messages['!valid_pass']);
    }

    $reg = findOneUser($email, $pass);
    if (!$reg) {
        throw new Error($error_messages['!exist_user']);
    }

    return $reg;
}


if ($result) {
    if($result['user'] == "superAdmin" && $result['pass'] == "12345678"){
        echo "hola";
    }
    session_start();
    $_SESSION['user'] = $result['user'];
    $_SESSION['roles'] = $result['roles'];
    echo $_SESSION['user'];
}else{
    header("Location:../../../index.php");
}
