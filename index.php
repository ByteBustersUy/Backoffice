<?php
require "./src/utils/validators/hasData.php";
require "./src/utils/validators/roles/isAdmin.php";
session_start();

if (!hasData($_SESSION['userRoles'])){
    header("Location:./pages/login.php");
    exit();
}

if ($isAdmin)
    header("Location:./pages/menu-admin.php");
else if ($isVendedor)
    header("Location:./pages/menu-vendedor.php");
else
    header("Location:./pages/login.php");

exit;
