<?php

function isValidPass(string $var): bool
{
    $lowerCase = "/[a-z]{1,}/";
    $upperCase = "/[A-Z]{1,}/";
    $number = "/[0-9]{1,}/";

    return 
        strlen($var) >= 8 &&
        preg_match($lowerCase, $var) &&
        preg_match($upperCase, $var) &&
        preg_match($number, $var) ? true : false;
}

?>