<?php
require "../../utils/validators/roles/isAdmin.php";
if (!$isAdmin || !$_POST) {
    header("Location:../../../pages/login.php");
    exit;
}
