<?php
function empreEstatus () : array
{   require '../../db/conexion.php';


    $res = $con->query("SELECT * FROM EMPRESA");
    $reg = $res->fetch();
    return $reg;
}
function updateEmpre($nom,$arg1)  
{
    require '../../db/conexion.php';

    try{
    $res = $con->prepare( "UPDATE `empresa` SET `logo` = '$arg1[logo]', `rubro` = '$arg1[rubro]',
                         `nombre` = '$arg1[nombre]', `calle` = '$arg1[calle]', `numero` = '$arg1[numero]', 
                         `ciudad` =' $arg1[ciudad]', `telefono` =' $arg1[telefono]', `instagram` = '$arg1[instagram]', 
                         `whatsapp` = '$arg1[whatsapp]',`comentarios` = '$arg1[comentarios]' WHERE `nombre` = ? ");
    $res->execute([$nom]); 
    }catch(Throwable $th){

        die("ERROR SQL in updateEmpre():".$th->getMessage());
    }
}


/*
,`email`= '$arg1[email]',`pwd_email`= '$arg1[pwd_email]'
*/

?>