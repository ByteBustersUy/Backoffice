<?php
require  realpath(dirname(__FILE__))."/../../utils/validators/roles/isVendedor.php";
if (!$isVendedor || !$_POST) {
    header("Location:../../../pages/login.php");
    exit;
}



$nombre = $_POST['nombre'];
$decripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$imagen = $_POST['imagen'];






?>