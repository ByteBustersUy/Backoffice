<?php
require "./src/utils/validators/hasData.php";
require "./src/utils/validators/roles/isAdmin.php";
session_start();

try {
    
    if (!hasData($_SESSION['userRoles'])) 
        header("Location:./pages/login.php");

    if ($isAdmin) 
        header("Location:./pages/menu-admin.php");
    else if ($isVendedor) 
        header("Location:./pages/menu-vendedor.php");
    else 
        header("Location:./pages/login.php");

} catch (Exception $e) {
    header("HTTP/1.0 404 NOT FOUND");
}
exit;
