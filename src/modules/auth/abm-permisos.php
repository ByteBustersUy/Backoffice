<?php

function hashPass(): string
{
    return password_hash("pass", PASSWORD_DEFAULT);
}

?>