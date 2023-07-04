<?php
session_start();
require_once "./src/utils/validators/hasData.php";
require_once "./src/utils/validators/roles/isAdmin.php";
require_once "./src/utils/validators/roles/isVendedor.php";
require_once "./src/repository/auth/loguear.repository.php";
require_once "./src/utils/actions.php";

if (!hasData($_SESSION['userRolesName'])){
    header("Location:./pages/login.php");
    exit();
}

if ($isAdmin)
    header("Location:./".findPathByAction($actions['menu-admin']));
else if ($isVendedor)
    header("Location:./".findPathByAction($actions['menu-vendedor']));
else
    header("Location:./pages/login.php");

exit;
