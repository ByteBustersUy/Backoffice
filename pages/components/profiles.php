<?php
require "../src/utils/actions.php";
require '../src/repository/users.repository.php';
session_status() === PHP_SESSION_ACTIVE ?: session_start();

$profiles = "";
foreach ($_SESSION['userRolesName'] as $rol){
    $profiles .= "<a class='link-profile' href=../" . findPathByAction($actions['menu-'.$rol]).">". $rol. "</a>";
}
$profiles .= "<a class='link-profile' href=./login.php> Cerrar Sesión</a>";

//TODO: Falta js para hacer funcionar el dropdown.

// $profiles = '<select class="profile" name="profile" id="select-profile">';
// foreach ($_SESSION['userRolesName'] as $rol){
//     $profiles.= '<option value="'. $rol .'">'. $rol. '</option>';
// }
// $profiles.= '<option value="logOut">Cerrar Sesión</option></select>';

