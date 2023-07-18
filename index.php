<?php
session_start();
require "./src/utils/validators/hasData.php";
require "./src/utils/validators/roles/isAdmin.php";
require "./src/utils/validators/roles/isVendedor.php";
require "./src/repository/users.repository.php";
require "./src/utils/actions.php";

if (!hasData($_SESSION['userRolesName'])) {
    header("Location:./pages/login.php");
    exit();
}

if ($isAdmin)
    header("Location:./" . findPathByAction($actions['menu-admin'], $_SESSION['userRolesIds']));
else if ($isVendedor)
    header("Location:./" . findPathByAction($actions['menu-vendedor'], $_SESSION['userRolesIds']));
else
    header("Location:./pages/login.php");

exit;
