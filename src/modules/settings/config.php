<?php
require "../../utils/validators/roles/isAdmin.php";
if (!$isAdmin) {
    header("Location:../../../pages/login.php");
    exit;
}


require '../../repository/settings/config-empr.php';

if(empreEstatus()=="vacio"){
    echo "no hay nada";
}elseif (empreEstatus()) {
    $arg = empreEstatus();
    return $arg;
}

$nom = $arg['nombre']; 

$nombre=$_POST['nombre']; 
$rubro=$_POST['rubro'];
$ciudad = $_POST['ciudad'];
$numero = $_POST['numero'];
$calle = $_POST['calle'];
$telefono = $_POST['telefono'];
$whatsapp = $_POST['whatsapp'];
$instagram = $_POST['instagram'];
$comentarios = $_POST['comentarios'];
$logo = $_POST['logo'];

$arg1 = array('nombre'=>$nombre,'rubro'=>$rubro,'ciudad'=>$ciudad,'numero'=>$numero,'calle'=>$calle,'telefono'=>$telefono
               ,'whatsapp'=>$whatsapp,'instagram'=>$instagram,'comentarios'=>$comentarios,'logo'=>$logo );

echo updateEmpre($nom,$arg1);



/*$email= $_POST[''];
$passEmail = $_POST[''];
,'email'=>$email,'pwd_email'=>$passEmail
*/
?>
