<?php
require  realpath(dirname(__FILE__))."/../../utils/validators/roles/isAdmin.php";
if (!$isAdmin || !$_POST) {
    header("Location:../../../pages/login.php");
    exit;
}

require realpath(dirname(__FILE__)).'/../../repository/settings/config.repository.php';

$nombre = $_POST['nombre'];
$rubro = $_POST['rubro'];
$ciudad = $_POST['ciudad'];
$numero = $_POST['numero'];
$calle = $_POST['calle'];
$telefono = $_POST['telefono'];
$whatsapp = $_POST['whatsapp'];
$instagram = $_POST['instagram'];
$comentario = $_POST['comentario'];
$logo = $_POST['logo'];
$email = $_POST['email'];
$passEmail = $_POST['pwd_email'];

//TODO: hacer validaciones del formulario

$dataToUpdate = [
    'nombre' => $nombre,
    'rubro' => $rubro,
    'ciudad' => $ciudad, 
    'numero' => $numero, 
    'calle' => $calle, 
    'telefono' => $telefono, 
    'whatsapp' => $whatsapp, 
    'instagram' => $instagram, 
    'comentario' => $comentario, 
    'logo' => $logo,
    'email' => $email,
    'pwd_email' => $passEmail
];

$result = saveDataEmpresa($dataToUpdate);

if($result == 1){
    header("Location:../../../pages/config-empresa.php");
}else{
    die('Error al guardar en db');
}

function getActionDataEmpresa()
{
    return  findAllDataEmpresa();
}
