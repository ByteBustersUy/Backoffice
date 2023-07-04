<?php
$profiles = '<select class="profile" name="profile" id="select-profile">';

foreach ($_SESSION['userRolesName'] as $rol){
    $profiles.= '<option value="'. $rol .'">'. $rol. '</option>';
}

$profiles.= '<option value="logOut">Cerrar Sesión</option></select>';

require "../src/utils/actions.php";
require '../src/repository/auth/loguear.repository.php';

$profiles = "";
foreach ($_SESSION['userRolesName'] as $rol){
    $profiles .= "<a href=../" . findPathByAction($actions['menu-'.$rol]).">". $rol. "</a></br>";
}

