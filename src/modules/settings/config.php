<?php
require realpath(dirname(__FILE__)) . '/../../repository/config.repository.php';
require realpath(dirname(__FILE__)) . '/../../utils/validators/hasData.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $rubro = htmlspecialchars($_POST['rubro']);
    $ciudad = htmlspecialchars($_POST['ciudad']);
    $numero = htmlspecialchars($_POST['numero']);
    $calle = htmlspecialchars($_POST['calle']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $whatsapp = htmlspecialchars($_POST['whatsapp']);
    $instagram = htmlspecialchars($_POST['instagram']);
    $comentario = htmlspecialchars($_POST['comentario']);
    $logo = htmlspecialchars($_POST['logo']);
    $email = htmlspecialchars($_POST['email']);
    $pwd_email = htmlspecialchars($_POST['pwd_email']);

    //TODO: hacer validaciones del formulario

    $currentDataEmpresa = getDataEmpresa();

    $dataToUpdate = [
        'nombre' => hasData($nombre) ? $nombre : $currentDataEmpresa['nombre'],
        'rubro' => hasData($rubro) ? $rubro : $currentDataEmpresa['rubro'],
        'ciudad' => hasData($ciudad) ? $ciudad : $currentDataEmpresa['ciudad'],
        'numero' => hasData($numero) ? $numero : $currentDataEmpresa['numero'],
        'calle' =>  hasData($calle) ? $calle : $currentDataEmpresa['calle'],
        'telefono' => hasData($telefono) ? $telefono : $currentDataEmpresa['telefono'],
        'whatsapp' => hasData($whatsapp) ? $whatsapp : $currentDataEmpresa['whatsapp'],
        'instagram' => hasData($instagram) ? $instagram : $currentDataEmpresa['instagram'],
        'comentario' => hasData($comentario) ? $comentario : $currentDataEmpresa['comentarios'],
        'logo' => hasData($logo) ? $logo : $currentDataEmpresa['logo'],
        'email' => hasData($email) ? $email : $currentDataEmpresa['email'],
        'pwd_email' => hasData($pwd_email) ? $pwd_email : $currentDataEmpresa['pwd_email'],
    ];

    $result = saveDataEmpresa($dataToUpdate);

    if ($result == 1) {
        header("Location:../../../pages/config-empresa.php");
    } else {
        die('Error al guardar en db');
    }
}

function getLabelsEmpresaHTML(): string
{
    $dataEmpresa = getDataEmpresa();
    $labelsEmpresa = '';
    $processedKeys = [];
    foreach ($dataEmpresa as $key => $data) {
        if (in_array($key, $processedKeys)) {
            continue; 
        }
        $labelsEmpresa .= '<label class="data-label">' . strtoupper($key) . ': ----> ' . $data . '</label>';
        array_push($processedKeys,$key);
    }
    return $labelsEmpresa;
}

function getDataEmpresa(): array
{
    require realpath(dirname(__FILE__)) . '/../../utils/messages/msg.php';

    $dataEmpresa = findAllDataEmpresa();
    return $dataEmpresa ? $dataEmpresa : die("Error: " . $error_messages['!data_empresa']);
}
