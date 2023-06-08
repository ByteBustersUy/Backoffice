<?php

function findOneUser($user, $pass) {
    require '../../db/conexion.php';

    try {
        $res = $con->query("SELECT * FROM usuarios WHERE user = '$user' AND pass = '$pass'");
        $reg = $res->fetch();
        return $reg;
    } catch (Throwable $th) {
        echo "Error al buscar en base de datos <br>";
        //die();
    }
}

?>