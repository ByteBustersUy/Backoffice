<?php

function findOneUser(string $userCi): array
{
    require '../../db/conexion.php';

    try {
        $res = $con->query("SELECT * FROM USUARIOS WHERE ci = '$userCi'");
        $reg = $res->fetch();
        return $reg ? $reg : [];
    } catch (Throwable $th) {
        die($th->getMessage());
    }
}

function findRolesByUserCi(string $ci): array
{
    require '../../db/conexion.php';
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
        die($th->getMessage());
    }
}

function findPathByAction(string $action): string
{
    require '/Applications/XAMPP/xamppfiles/htdocs/Backoffice/src/db/conexion.php';
    try {
        $res = $con->query("SELECT ruta FROM RUTAS WHERE `action` = $action");
        $reg = $res->fetch();
        return $reg['ruta'];
    } catch (Throwable $th) {
        die($th->getMessage());
    }
}
