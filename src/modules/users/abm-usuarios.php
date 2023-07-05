<?php
require "/Applications/XAMPP/xamppfiles/htdocs/Backoffice/src/utils/validators/roles/isAdmin.php";
if (!$isAdmin) {
    header("Location:../../../pages/login.php");
    exit;
}

if($_POST){
    require realpath(dirname(__FILE__))."/persona.php";
    require realpath(dirname(__FILE__))."/usuario.php";

    try{
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $email = $_POST['email'];
        $pass = hashPass($_POST['contrasenia']);
        $roles = [$_POST['roles']];
    }catch(Exception $e){
        throw new ErrorException("Error al procesar datos de formulario. >>".$e->getMessage());
    }

    $newUser = new Usuario($nombre, $apellido, $cedula, $email, $pass, $roles);
    echo $newUser->getNombre().' contraseña hasheada: '.$newUser->getPass();

}
function hashPass(string $pass): string
{
    return password_hash($pass, PASSWORD_DEFAULT);
}

function getUsersData(): array 
{
    return findAllUsers();
}
?>