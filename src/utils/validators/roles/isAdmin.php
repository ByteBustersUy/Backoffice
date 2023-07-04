<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
$isAdmin = false;
if(isset($_SESSION['userRolesName'])){
    foreach ($_SESSION['userRolesName'] as $rol) {
        if ($rol == 'admin') {
            $isAdmin = true;
        }
    }
}else{
    echo "INTERNAL SERVER ERROR. isAdmin.php";
}
