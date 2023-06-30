<?php

try {
    $con = new PDO("mysql:host=localhost;dbname=bytebusters_db","root","");
} catch (Error $e) {
    die("Connection failed: ". $e->getMessage());
}
