<?php

header('Content-Type: application/json');
$json1 = '{"a":10,"b":20,"c":30,"d":40,"e":50}';
$json2 = json_encode(json_decode($json1), JSON_PRETTY_PRINT);
echo $json2;
