<?php

function hasData(string $var): bool
{
    return
        isset($var) &&
        !empty($var) ? true : false;
}
