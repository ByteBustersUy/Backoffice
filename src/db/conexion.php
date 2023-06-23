<?php

try {
    $con = new PDO("mysql:host=".getenv("DB_HOST").";dbname=".getenv("DB_NAME"), getenv("DB_USER"), getenv("DB_PASS"));
} catch (Error $e) {
    echo "Error al conectar con la base de datos.<br><br>";
    die();
}
