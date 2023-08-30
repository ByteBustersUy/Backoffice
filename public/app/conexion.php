<?php
try {
    $con = new PDO("mysql:host=localhost;dbname=bytebusters2_db",'root','');

} catch (PDOException $e) {
    exit;
}

?>