<?php

function findOneUser(string $ci): array
{
    require realpath(dirname(__FILE__))."/../../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT * FROM USUARIOS WHERE ci = :ci");
        $statement->execute(array(':ci' => $ci));
        $reg = $statement->fetch();
        return $reg ? $reg : [];
    } catch (Exception $e) {
        die("ERROR SQL in findOneUser(): ".$e->getMessage());
    }
}

function findAllUsers(): array
{
    require realpath(dirname(__FILE__))."/../../db/conexion.php";
    try {
        $res = $con->query("SELECT * FROM USUARIOS ORDER BY nombre ASC");
        $reg = $res->fetchAll();
        return $reg;
    } catch (Exception $e) {
        die("ERROR SQL in findAllUsers(): ".$e->getMessage());
    }
}

function findRoles(string $ci): array
{
    require realpath(dirname(__FILE__))."/../../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT nombreRol
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
    } catch (Exception $e) {
        die("ERROR SQL in findRoles(): ".$e->getMessage());
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
    } catch (Exception $e) {
        die("ERROR SQL in findPathByAction(): ".$e->getMessage());
    }
}

function saveOneUser (array $newUser)
{
    require realpath(dirname(__FILE__))."/../../db/conexion.php";
    try {
        $statement = $con->prepare("INSERT INTO USUARIOS (nombre,apellido,ci,email,pass) VALUES (:nombre, :apellido, :ci, :email, :pass)");
        $res = $statement->execute([
            ':nombre' => $newUser['nombre'], 
            ':apellido' => $newUser['apellido'], 
            ':ci' => $newUser['cedula'], 
            ':email' => $newUser['email'], 
            ':pass' => $newUser['pass']
        ]);
        
        if($res == 1){
            $statement = $con->prepare("INSERT INTO USUARIOS_has_ROLES (USUARIOS_ci,ROLES_id) VALUES (:ci, :rolId)");
            foreach ($newUser['rolesId'] as $rolId){
                $statement->execute(array(':ci' => $newUser['cedula'], ':rolId' => $rolId)); 
            }
        }else{
            die("ERROR: Usuario no agregado");
        }
    } catch (Exception $e) {
        die("ERROR SQL in saveOneUser(): ".$e->getMessage());
    }
}
