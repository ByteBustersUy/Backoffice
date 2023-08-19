<?php
function hasData($var): bool
{
    return isset($var) && !empty($var) && $var ? true : false;
}

function elementsHasData(array $var): bool
{
    foreach ($var as $element){
        if(!isset($element) || empty($element) || preg_match('/(^\s+$)|(^\s+)|(\s+$)/', $element)){
            return false;
        }
    }
    return true;
}
