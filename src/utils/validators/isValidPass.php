<?php

    function isValidPass($var){
        return 
            isset($var) &&
            !empty($var) &&
            strlen($var) >= 8 ? true : false;
    }
