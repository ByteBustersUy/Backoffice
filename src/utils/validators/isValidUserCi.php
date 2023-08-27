<?php

function isValidUserCi(string $var): bool
{
    $regex = "/^[1-9]{1}[0-9]{7}$/";
    return preg_match($regex, $var) ? true : false;
}
