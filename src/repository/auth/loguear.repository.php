<?php

function findOneUser($userName, $pass) {
    require '../../db/conexion.php';

    try {
        $res = $con->query("SELECT * FROM USUARIOS WHERE ci = '$userName' AND pass = '$pass'");
        $reg = $res->fetch();
        return $reg;
    } catch (Throwable $th) {
        echo "Error al buscar en base de datos <br>";
        //die();
    }
}

?>