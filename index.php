<?php
require "./src/utils/validators/hasData.php";
require "./src/utils/validators/roles/isAdmin.php";
require "./src/utils/validators/roles/isVendedor.php";
require "./src/repository/auth/loguear.repository.php";
require "./src/utils/actions.php";
if(!session_start()){
    session_start();
}

if (!hasData($_SESSION['userRolesName'])){
    header("Location:./pages/login.php");
    exit();
}

if ($isAdmin)
    header("Location:./".findPathByAction($actions['menuAdmin']));
else if ($isVendedor)
    header("Location:./".findPathByAction($actions['menuVendedor']));
else
    header("Location:./pages/login.php");

exit;
