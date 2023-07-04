<?php
if(!isset($_SESSION[0]) || empty($_SESSION[0])){
    session_start();
}
session_destroy();
?>
