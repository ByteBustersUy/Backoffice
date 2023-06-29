<?php
session_start();
$isVendedor = false;

foreach ($_SESSION['userRoles'] as $rol) {
    if ($rol == 'vendedor') {
        $isVendedor = true;
    }
}
?>
