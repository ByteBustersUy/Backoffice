<?php
function getDataEmpresa () : array
{   
    require '../../db/conexion.php';
    $res = $con->query("SELECT * FROM EMPRESA");
    $reg = $res->fetch();
    return $reg;
}
function setDataEmpresa($currentName,$dataToUpdate): bool 
{
    require '../../db/conexion.php';

    if(empty($currentName)){
        $currentName = 'default';
    }

    try{
    $res = $con->prepare( "UPDATE `empresa` SET `logo` = '$dataToUpdate[logo]', `rubro` = '$dataToUpdate[rubro]',
                         `nombre` = '$dataToUpdate[nombre]', `calle` = '$dataToUpdate[calle]', `numero` = '$dataToUpdate[numero]', 
                         `ciudad` =' $dataToUpdate[ciudad]', `telefono` =' $dataToUpdate[telefono]', `instagram` = '$dataToUpdate[instagram]', 
                         `whatsapp` = '$dataToUpdate[whatsapp]',`comentarios` = '$dataToUpdate[comentario]'");
    $res->execute([$currentName]); 
    return true;
    }catch(Throwable $th){
        die("ERROR SQL in updateEmpre():".$th->getMessage());
    }
}


/*
,`email`= '$dataToUpdate[email]',`pwd_email`= '$dataToUpdate[pwd_email]'
*/

?>