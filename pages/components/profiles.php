<?php

$profiles = '<select class="profile" name="profile" id="select-profile">';

foreach ($_SESSION['userRoles'] as $rol){
    $profiles.= '<option value="'. $rol .'">'. $rol. '</option>';
}

$profiles.= '<option value="logOut">Cerrar Sesión</option></select>';
