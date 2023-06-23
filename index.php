<?php
session_start();

if($_SESSION['user']){
    echo "<h1>ya tas logueado pa!</h1>";
    echo "<h2>User: ". $_SESSION['user']. "</h2>";

    //si es rol admin
    header("Location:./pages/menu/admin.php");

}else{
    header("Location:./pages/login.php");
}
