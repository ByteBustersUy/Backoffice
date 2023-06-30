<?php

function findOneUser(string $userCi): array
{
    require '../../db/conexion.php';
    
    try {
        $res = $con->query("SELECT * FROM USUARIOS WHERE ci = '$userCi'");
        $reg = $res->fetch();
        return $reg;
    } catch (Throwable $th) {
        die($th->getMessage());
    }
}

function findRolesByUserCi(string $ci): array
{
    require '../../db/conexion.php';
    try {
        $res = $con->query("SELECT nombreRol
                            FROM USUARIOS_has_ROLES ur
                            JOIN ROLES r ON r.id = ur.ROLES_id
                            WHERE ur.USUARIOS_ci = $ci");
        $rolNamesList = [];
        while ($reg = $res->fetch()) {
            array_push($rolNamesList, $reg['nombreRol']);
        }
        return $rolNamesList;
    } catch (Throwable $th) {
        die($th->getMessage());
        
    }
}
