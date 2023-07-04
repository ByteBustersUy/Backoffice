<?php
require "/Applications/XAMPP/xamppfiles/htdocs/Backoffice/src/utils/validators/roles/isAdmin.php";
if (!$isAdmin) {
    header("Location:../../../pages/login.php");
    exit;
}

$usersData = getUsersData();


function hashPass(string $pass): string
{
    return password_hash($pass, PASSWORD_DEFAULT);
}

function getUsersData(): array 
{
    return findAllUsers();
}
?>