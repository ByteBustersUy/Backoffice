<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
$isVendedor = false;

if (isset($_SESSION['userRolesName'])) {
    foreach ($_SESSION['userRolesName'] as $rol) {
        if ($rol == 'vendedor') {
            $isVendedor = true;
        }
    }
} else {
    echo "INTERNAL SERVER ERROR. isVendedor.php";
}
