<?php
require "../../utils/validators/roles/isAdmin.php";
if (!$isAdmin) {
    header("Location:../../../pages/login.php");
    exit;
}

?>