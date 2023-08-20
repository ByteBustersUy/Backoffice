<?php

function findOneUser(string $ci): array
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT * FROM USUARIOS WHERE ci = :ci");
        $statement->execute(array(':ci' => $ci));
        $reg = $statement->fetch(PDO::FETCH_ASSOC);
        return $reg ? $reg : [];
    } catch (Exception $e) {
        die("ERROR SQL in findOneUser(): " . $e->getMessage());
    }
}

function findAllUsers(): array
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    try {
        $res = $con->query("SELECT * FROM USUARIOS ORDER BY nombre ASC");
        $reg = $res->fetchAll(PDO::FETCH_ASSOC);
        return $reg ? $reg : [];
    } catch (Exception $e) {
        die("ERROR SQL in findAllUsers(): " . $e->getMessage());
    }
}

function findRoles(string $ci): array
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT id, nombreRol
                                    FROM USUARIOS_has_ROLES ur
                                    JOIN ROLES r 
                                    ON r.id = ur.ROLES_id
                                    WHERE ur.USUARIOS_ci = :ci");
        $statement->execute(array(':ci' => $ci));

        $rolNamesList = [];
        $rolesIdsList = [];
        while ($reg = $statement->fetch(PDO::FETCH_ASSOC)) {
            if ($reg) {
                array_push($rolesIdsList, $reg['id']);
                array_push($rolNamesList, $reg['nombreRol']);
            }
        }
        return [$rolesIdsList, $rolNamesList];
    } catch (Exception $e) {
        die("ERROR SQL in findRoles(): " . $e->getMessage());
    }
}

function findPathByAction(string $action, array $rolesId): string
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT p.ruta, rp.ROLES_id
                                    FROM PERMISOS p
                                    JOIN ROLES_has_PERMISOS rp
                                    WHERE p.accion = :accion");
        $statement->execute(array(':accion' => $action));
        $reg = $statement->fetch(PDO::FETCH_ASSOC);

        $isValidRol = false;
        foreach ($rolesId as $rolId) {
            if ($rolId == $reg['ROLES_id']) {
                $isValidRol = true;
            }
        }

        return $reg['ruta'] && $isValidRol ? $reg['ruta'] : '';
    } catch (Exception $e) {
        die("ERROR SQL in findPathByAction(): " . $e->getMessage());
    }
}

function findActionsByRolesId(array $rolesId): array
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    $actions = [];
    foreach ($rolesId as $rolId) {
        try {
            $statement = $con->prepare(
                "SELECT p.accion 
                                        FROM PERMISOS p
                                        JOIN ROLES_has_PERMISOS rp
                                        WHERE rp.ROLES_id = :rolId"
            );
            $statement->execute(array(':rolId' => $rolId));
            while ($reg = $statement->fetch(PDO::FETCH_ASSOC)) {
                array_push($actions, $reg['accion']);
            }
        } catch (Exception $e) {
            die("ERROR SQL in findActionsByRolesId(): " . $e->getMessage());
        }
    }
    return $actions;
}

function saveOneUser(array $newUser)
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    require realpath(dirname(__FILE__)) . "/../utils/messages/msg.php";
    try {
        $statement = $con->prepare("INSERT INTO USUARIOS (nombre,apellido,ci,email,pass) VALUES (:nombre, :apellido, :ci, :email, :pass)");
        $res = $statement->execute([
            ':nombre' => $newUser['nombre'],
            ':apellido' => $newUser['apellido'],
            ':ci' => $newUser['cedula'],
            ':email' => $newUser['email'],
            ':pass' => $newUser['pass']
        ]);

        if ($res == 1) {
            $statement = $con->prepare("INSERT INTO USUARIOS_has_ROLES (USUARIOS_ci,ROLES_id) VALUES (:ci, :rolId)");
            foreach ($newUser['rolesId'] as $rolId) {
                $statement->execute(array(':ci' => $newUser['cedula'], ':rolId' => $rolId));
            }
        } else {
            die("ERROR: " . $error_messages['!user_add']);
        }
    } catch (Exception $e) {
        die("ERROR SQL in saveOneUser(): " . $e->getMessage());
    }
}

function updateOneUser(array $newUser)
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    require realpath(dirname(__FILE__)) . "/../utils/messages/msg.php";
    try {
        $statement = $con->prepare("UPDATE USUARIOS
                                    SET nombre = :nombre,
                                    apellido = :apellido,
                                    email = :email
                                    WHERE ci = :ci");
        $res = $statement->execute([
            ':nombre' => $newUser['nombre'],
            ':apellido' => $newUser['apellido'],
            ':email' => $newUser['email'],
            ':ci' => $newUser['cedula'],
        ]);

        if($res == 1 && $newUser['cedula'] !== $_SESSION['userCi']){
            $statement = $con->prepare("DELETE FROM USUARIOS_has_ROLES WHERE USUARIOS_ci = :ci");
            $res = $statement->execute([':ci' => $newUser['cedula']]);
    
            $statement = $con->prepare("INSERT INTO USUARIOS_has_ROLES (USUARIOS_ci,ROLES_id) VALUES (:ci, :rolId)");
            foreach ($newUser['rolesId'] as $rolId) {
                $statement->execute(array(':ci' => $newUser['cedula'], ':rolId' => $rolId));
            }
        }
    } catch (Exception $e) {
        die("ERROR SQL in saveOneUser(): " . $e->getMessage());
    }
}

function deleteUser(string $userCi)
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    require realpath(dirname(__FILE__)) . "/../utils/messages/msg.php";

    try {
        $statement = $con->prepare("DELETE FROM USUARIOS_has_ROLES WHERE USUARIOS_ci = :ci");
        $res = $statement->execute([':ci' => $userCi]);

        if ($res == 1) {
            $statement = $con->prepare("DELETE FROM USUARIOS WHERE ci = :ci");
            $statement->execute([':ci' => $userCi]);
        } else {
            die("ERROR: " . $error_messages['!user_delete']);
        }
    } catch (Exception $e) {
        die("ERROR SQL in saveOneUser(): " . $e->getMessage());
    }
}
