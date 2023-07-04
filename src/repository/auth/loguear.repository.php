<?php

function findOneUser(string $userCi): array
{
    require realpath(dirname(__FILE__))."/../../db/conexion.php";
    try {
        $res = $con->query("SELECT * FROM USUARIOS WHERE ci = '$userCi'");
        $reg = $res->fetch();
        return $reg ? $reg : [];
    } catch (Throwable $th) {
        die("ERROR SQL in findOneUser(): ".$th->getMessage());
    }
}

function findRolesByUserCi(string $ci): array
{
    require realpath(dirname(__FILE__))."/../../db/conexion.php";
    try {
        $res = $con->query("SELECT id, nombreRol
                            FROM USUARIOS_has_ROLES ur
                            JOIN ROLES r ON r.id = ur.ROLES_id
                            WHERE ur.USUARIOS_ci = $ci");
        $rolNamesList = [];
        $rolIdList = [];
        while ($reg = $res->fetch()) {
            if ($reg) {
                array_push($rolNamesList, $reg['nombreRol']);
                array_push($rolIdList, $reg['id']);
            }
        }
        return [$rolIdList, $rolNamesList];
    } catch (Throwable $th) {
        die("ERROR SQL in findRolesByUserCi(): ".$th->getMessage());
    }
}

function findPathByAction(string $action): string
{
    require realpath(dirname(__FILE__))."/../../db/conexion.php";
    try {
        $res = $con->query("SELECT * FROM RUTAS WHERE accion = '$action'");
        $reg = $res->fetch();
        $path = $reg['ruta'];
        return $path;
    } catch (Throwable $th) {
        die("ERROR SQL in findPathByAction(): ".$th->getMessage());
    }
}
