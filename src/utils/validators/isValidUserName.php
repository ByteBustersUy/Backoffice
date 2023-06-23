<?php

function isValidUserName(string $var): bool
{
    $regex = "/^[1-9]{8}$/";

    return preg_match($regex, $var) ? true : false;
}
