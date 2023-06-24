<?php

try {
    $con = new PDO("mysql:host=localhost;dbname=dbByteBusters","root","");
} catch (Error $e) {
    die();
}
