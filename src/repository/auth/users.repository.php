<?php

function findOneUser(string $ci): array
{
    require realpath(dirname(__FILE__))."/../../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT * FROM USUARIOS WHERE ci = :ci");
        $statement->execute(array(':ci' => $ci));
        $reg = $statement->fetch();
        return $reg ? $reg : [];
    } catch (Throwable $th) {
        die("ERROR SQL in findOneUser(): ".$th->getMessage());
    }
}

function findAllUsers(): array
{
    require realpath(dirname(__FILE__))."/../../db/conexion.php";
    try {
        $res = $con->query("SELECT * FROM USUARIOS ORDER BY nombre ASC");
        $reg = $res->fetchAll();
        return $reg;
    } catch (Throwable $th) {
        die("ERROR SQL in findAllUsers(): ".$th->getMessage());
    }
}

function findRolesByUserCi(string $ci): array
{
    require realpath(dirname(__FILE__))."/../../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT id, nombreRol
                            FROM USUARIOS_has_ROLES ur
                            JOIN ROLES r ON r.id = ur.ROLES_id
                            WHERE ur.USUARIOS_ci = :ci");
        $statement->execute(array(':ci' => $ci));

        $rolNamesList = [];
        while ($reg = $statement->fetch()) {
            if ($reg) {
                array_push($rolNamesList, $reg['nombreRol']);
            }
        }
        return $rolNamesList;
    } catch (Throwable $th) {
        die("ERROR SQL in findRolesByUserCi(): ".$th->getMessage());
    }
}

function findPathByAction(string $action): string
{
    require realpath(dirname(__FILE__))."/../../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT * FROM RUTAS WHERE accion = :accion");
        $statement->execute(array(':accion' => $action));
        $reg = $statement->fetch();
        return $reg['ruta'];
    } catch (Throwable $th) {
        die("ERROR SQL in findPathByAction(): ".$th->getMessage());
    }
}
