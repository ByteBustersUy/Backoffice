<?php
session_start();

if (!isset($_SESSION["roles"]) || empty($_SESSION["roles"]) || $_SESSION["roles"] == "guest") {
    header("Location:./pages/login.php");
}else{
    $_SESSION["roles"] = "admin";
    header("Location:./pages/menu/" . $_SESSION["roles"] . ".php");
}
