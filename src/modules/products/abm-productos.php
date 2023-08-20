<?php
require realpath(dirname(__FILE__)) . "/../../utils/messages/msg.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_status() === PHP_SESSION_ACTIVE ?: session_start();

    if ($_GET['action'] == "delete" && isset($_POST["deleteProductId"])) {
        if ($_POST["deleteUserCi"] != $_SESSION['productId']) {
            deleteProduct($_POST["deleteProductid"]);
        }
    } else if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == "edit") {
        editProduct($_GET['id']);
    } else {
        addProduct();
    }
}

function addProduct() {

}

function editProduct(string $productId) {
    
}

function deleteProduct(string $productId) {
    
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
                            <tr id="' . $product['id'] . '" class="user-select-none align-middle" onclick="selectProductRow(' . $product['id'] . ')">
                                <td class="first-in-table">' . $product['nombre'] . '</td>
                                <td>' . $category . '</td>
                                <td>' . $product['imagen'] . '</td>
                                <td>' . $isPromo . '</td>
                                <td><button class="btn-eye"><i class="fa-solid fa-eye"></i></button></td>
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