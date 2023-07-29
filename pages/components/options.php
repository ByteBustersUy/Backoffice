<?php
require "../src/utils/actions.php";
require '../src/repository/users.repository.php';
session_status() === PHP_SESSION_ACTIVE ?: session_start();

$options = "<a class='link-options' href='./menu.php'>Menú Principal</a>";
$options .= "<a class='link-options' href=./login.php> Cerrar Sesión</a>";