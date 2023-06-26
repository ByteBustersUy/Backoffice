<?php

function findOneUser(string $userName, string $pass): array
{
    require '../../db/conexion.php';
    try {
        $res = $con->query("SELECT * FROM USUARIOS WHERE ci = '$userName' AND pass = '$pass'");
        $reg = $res->fetch();
        return $reg;
    } catch (Throwable $th) {
        echo "Error al buscar en base de datos <br>";
        die();
    }
}

function findRolesByUserCi(string $ci): array
{
    require '../../db/conexion.php';
    try {
        $res = $con->query("SELECT * FROM USUARIOS_has_Roles WHERE ci = '$ci'");
        $reg = $res->fetch();
        return $reg;
    } catch (Throwable $th) {
        echo "Error al buscar en base de datos <br>";
    }
}
