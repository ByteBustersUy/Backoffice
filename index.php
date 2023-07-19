<?php
session_start();
require "./src/utils/validators/hasData.php";
// require "./src/utils/validators/roles/isAdmin.php";
// require "./src/utils/validators/roles/isVendedor.php";
// require "./src/repository/users.repository.php";
// require "./src/utils/actions.php";

if (!hasData($_SESSION['userRolesName'])) {
    header("Location:./pages/login.php");
    exit;
}

header("Location:./pages/menu.php");
exit;
