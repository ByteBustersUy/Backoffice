<?php
require realpath(dirname(__FILE__)) . "/../../utils/actions.php";
require realpath(dirname(__FILE__)) . "/../../repository/users.repository.php";
session_status() === PHP_SESSION_ACTIVE ?: session_start();

$cardsList = [
    "usuarios" => [
        'action' => $actions['gestionar-usuarios'],
        'i' => '<i class="fa-solid fa-users"></i>',
        'h4' => '<h4>USUARIOS</h4>',
        'p' =>  '<p>Agregar, editar o eliminar usuarios</p>',
    ],
    "permisos" => [
        'action' => $actions['gestionar-permisos'],
        'i' => '<i class="fa-solid fa-shield"></i>',
        'h4' => '<h4>PERMISOS</h4>',
        'p' =>  '<p>Agregar, editar o eliminar permisos</p>',
    ],
    "productos" => [
        'action' => $actions['gestionar-productos'],
        'i' => '<i class="fa-solid fa-basket-shopping"></i>',
        'h4' => '<h4>PRODUCTOS</h4>',
        'p' => '<p>Agregar, editar o eliminar productos</p>'
    ],
    "promociones" => [
        'action' => $actions['gestionar-promociones'],
        'i' => '<i class="fa-solid fa-rectangle-ad"></i>',
        'h4' => '<h4>PROMOCIONES</h4>',
        'p' => '<p>Agregar, editar o eliminar promociónes</p>'
    ],
    "configuracion" => [
        'action' => $actions['configurar-empresa'],
        'i' => '<i class="fa-solid fa-gears"></i>',
        'h4' => '<h4>EMPRESA</h4>',
        'p' => '<p>Agregar, editar datos de empresa</p>'
    ],
    "descargas" => [
        'action' => $actions['descargar-documentos'],
        'i' => '<i class="fa-solid fa-file-arrow-down"></i>',
        'h4' => '<h4>DESCARGAS</h4>',
        'p' => '<p>Catálogo de productos e informe de ventas</p>'
    ],
];

$cardsMenu = '';
$validActions = findActionsByRolesId($_SESSION['userRolesIds']);

foreach ($cardsList as $cardData) {
    if (in_array($cardData['action'], $validActions)) {
        $cardsMenu .= "
        <div class='col-md-4 col-xxl-" . getColumnsForDynamicResponsive($cardsList,$validActions) . " center'>
        <div class='menu-cards'>
        <a href='../" . findPathByAction($cardData['action'], $_SESSION['userRolesIds']) . "'>
        <div>"
            . $cardData['i']
            . $cardData['h4']
            . $cardData['p'] .
            "</div>
        </a>
        </div>
        </div>";
    }
}


function getColumnsForDynamicResponsive(array $cardsList, array $validActions): int
{
    require realpath(dirname(__FILE__)) . "/../../utils/actions.php";
    
    $numberOfCards = 0;
    foreach ($cardsList as $cardData) {
        if (in_array($cardData['action'], $validActions)) {
            $numberOfCards++;
        }
    }

    if ($numberOfCards === 0) {
        $numberOfCards = 1;
    }

    $cols = 12 / $numberOfCards;
    if (gettype($cols) !== 'int') {
        $cols = floor($cols);
    }

    if ($cols < 2) {
        $cols = 2;
    }

    return $cols;
}
