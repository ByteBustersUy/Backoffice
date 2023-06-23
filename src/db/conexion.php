<?php

try {
    $con = new PDO("mysql:host=localhost;dbname=dbFede","root","");
} catch (Error $e) {
    die();
}
