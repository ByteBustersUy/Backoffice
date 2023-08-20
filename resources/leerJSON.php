<?php
// Read a json file
$Json = file_get_contents("./myfile.json");
// Converts to an array 
$myarray = json_decode($Json, true);
?>