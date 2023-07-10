<?php
function findAllDataEmpresa(): array
{   
    require realpath(dirname(__FILE__))."/../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT nombre,rubro,calle,numero,ciudad,telefono,whatsapp,instagram,email,pwd_email,comentarios,logo FROM EMPRESA");
        $statement->execute();
        $reg = $statement->fetch(PDO::FETCH_ASSOC);
        return $reg? $reg : [];
    } catch (Exception $e) {
        die("ERROR SQL in findAllDataEmpresa(): ".$e->getMessage());
    }
}
function saveDataEmpresa(array $dataToUpdate): bool
{
    require realpath(dirname(__FILE__))."/../db/conexion.php";
    try{
    $statement = $con->prepare(
        "UPDATE empresa 
        SET logo = '$dataToUpdate[logo]',
        rubro = '$dataToUpdate[rubro]',
        nombre = '$dataToUpdate[nombre]',
        calle = '$dataToUpdate[calle]', 
        numero = '$dataToUpdate[numero]', 
        ciudad = '$dataToUpdate[ciudad]', 
        telefono = '$dataToUpdate[telefono]', 
        instagram = '$dataToUpdate[instagram]', 
        whatsapp = '$dataToUpdate[whatsapp]',
        comentarios = '$dataToUpdate[comentario]',
        email = '$dataToUpdate[email]',
        pwd_email = '$dataToUpdate[pwd_email]'");
    $res = $statement->execute();
    return $res;
    }catch(Exception $e){
        die("ERROR SQL in setDataEmpresa(): ".$e->getMessage());
    }
}