<?php
session_start();
require "./src/utils/validators/hasData.php";

if (!hasData($_SESSION['userRolesName'])) {
    header("Location:./pages/login.php");
    exit;
}

header("Location:./pages/menu.php");
exit;
