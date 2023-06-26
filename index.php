<?php
require "./src/utils/validators/hasData.php";
session_start();

//TODO: modificar base de datos para implementar roles

if(/*hasData($_SESSION['userRol']) && */hasData($_SESSION['userCi'])){

    echo "<h1>ya tas logueado pa!</h1>";
    echo "<h2>User: ". $_SESSION['userCi']. "</h2>";
    echo "<h2>Rol: ". $_SESSION['userRol']. "</h2>";

    //si es rol admin
    if($_SESSION['userRol'] == 'admin')
        header("Location:./pages/menu/admin.php");

    if($_SESSION['userRol'] == 'vendedor')
        header("Location:./pages/menu/vendedor.php");

}else{
    header("Location:./pages/login.php");
}
