<?php
session_start();
$isAdmin = false;

if(isset($_SESSION['userRoles']))

foreach ($_SESSION['userRoles'] as $rol) {
    if ($rol == 'admin') {
        $isAdmin = true;
    }
}
?>
