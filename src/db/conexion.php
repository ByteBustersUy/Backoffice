<?php

try {
    //TODO: poner nombre de la base de datos en la cadena de conexión
    $con = new PDO("mysql:host=localhost;dbname=dbFede", "root",);
} catch (Error $e) {
    echo "Error al conectar con la base de datos.<br><br>";
    die();
}
