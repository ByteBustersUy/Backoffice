<?php

function isValidEmail(string $var): bool
{
    $validEmails = [
        'vera.com.uy',
        'gmail.com',
        'hotmail.com',
        'bytebusters.com'
    ];
    foreach ($validEmails as $email){
        $regex = "/^[a-z0-9\._-]+@(?:".$email.")$/";
        if(preg_match($regex,$var)){
            return true;
        }
    }

    return false;
}
