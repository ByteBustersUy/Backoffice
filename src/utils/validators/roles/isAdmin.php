<?php
session_start();
$isAdmin = false;

foreach ($_SESSION['userRoles'] as $rol) {
    if ($rol == 'admin') {
        $isAdmin = true;
    }
}
?>
