<?php
echo "<h1>HOLAA</h1>";

function hashPass(): string
{
    return password_hash("pass", PASSWORD_DEFAULT);
}
?>