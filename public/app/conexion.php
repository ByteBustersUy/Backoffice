<?php
try {
    $con = new PDO("mysql:host=localhost;dbname=bytebusters_db",'root','');

} catch (PDOException $e) {
    exit;
}



?>