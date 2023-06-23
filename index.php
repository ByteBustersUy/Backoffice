<?php
session_start();

if($_SESSION['user']){
    echo "<h1>ya tas logueado pa!</h1>";
    echo "<h2>User: ". $_SESSION['user']. "</h2>";
}


