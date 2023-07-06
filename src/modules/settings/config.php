<?php
require "../../utils/validators/roles/isAdmin.php";
if (!$isAdmin) {
    header("Location:../../../pages/login.php");
    exit;
}

require '../../repository/settings/config.repository.php';

$dataEmpresa = getDataEmpresa();

if (!empty($dataEmpresa)) {
    $currentName = $dataEmpresa['nombre'];
}


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



$dataToUpdate = array(
    'nombre' => $nombre, 'rubro' => $rubro, 'ciudad' => $ciudad, 'numero' => $numero, 'calle' => $calle, 'telefono' => $telefono, 'whatsapp' => $whatsapp, 'instagram' => $instagram, 'comentarios' => $comentarios, 'logo' => $logo
);

echo setDataEmpresa($currentName, $dataToUpdate);



/*$email= $_POST[''];
$passEmail = $_POST[''];
,'email'=>$email,'pwd_email'=>$passEmail
*/
