<?php
function hasData($var): bool
{
    return isset($var) && !empty($var) ? true : false;
}

?>