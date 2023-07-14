<?php

function varchar45(string $var): bool
{
    return
        is_string($var) &&
        strlen($var) <= 45 ? true : false;
}

function varchar255(string $var): bool
{
    return
        is_string($var) &&
        strlen($var) <= 255 ? true : false;
}

function date(string $var)
{
    //TODO:
}

function decimal(string $var)
{
    //TODO:
}
