<?php

function isValidUserCi(string $var): bool
{
    $regex = "/^[0-9]{7,8}$/";
    return preg_match($regex, $var) ? true : false;
}
