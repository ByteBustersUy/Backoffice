<?php
//print_r($_FILES);
$fileTmpPath = $_FILES['archivo']['tmp_name'];
$fileName = $_FILES['archivo']['name'];
$fileSize = $_FILES['archivo']['size'];
$fileType = $_FILES['archivo']['type'];
$dir = './imagenes/';
echo $destino = $dir . $fileName;

//print_r (move_uploaded_file($fileTmpPath, $destino));
if (move_uploaded_file($fileTmpPath, $destino)) {
    echo "Fue guardado";
}else{

    echo "Error";
}






?>