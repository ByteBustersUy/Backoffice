<?php
require realpath(dirname(__FILE__)) . "/../../utils/messages/msg.php";

if ($_POST) {
    $nombre = strtolower($_POST['nombre']);
    $descripcion = strtolower($_POST['descripcion']);
    $idCategoria = strtolower($_POST['categoria']);
    $imagen = strtolower($_POST['imagen']);

    require realpath(dirname(__FILE__)) . "/../../repository/products.repository.php";

    if (findOneProduct($nombre)) {
        die("ERROR: " . $error_messages['exist_product'] . ". ('" . $nombre . "')");
    }

    $newProduct = [
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'idCategoria' => $idCategoria,
        'imagen' => $imagen
    ];

    saveOneProduct($newProduct);
    header("Location:../../../pages/abm-productos.php");
}


function getProductsTableData(): string
{
    require realpath(dirname(__FILE__)) . "/../../repository/products.repository.php";
    $productsData = findAllProducts();
    $productsList = '';
    foreach ($productsData as $product) {
        $category = findProductCategoryByProductId($product['id']);
        $isPromo = findProductPromotionStatus($product['id']);
        $isPromo == 1 ? $isPromo = "Si" : $isPromo = "No";
        $productsList .= '
                            <tr class="user-select-none align-middle">
                                <td class="first-in-table">' . $product['nombre'] . '</td>
                                <td>' . $category . '</td>
                                <td>' . $product['imagen'] . '</td>
                                <td>' . $isPromo . '</td>
                                <td class="align-middle"><button class="btn-eye"><i class="fa-solid fa-eye"></i></button></td>
                            </tr>';
    }
    return $productsList;
}

function getOptionsCategoriesHTML(): string
{

    $categories = findAllCategories();
    $options = '';
    foreach ($categories as $category) {
        $options .= '<option value="' . $category['id'] . '">' . $category['nombre'] . '</option>';
    }
    return $options;
}
