<?php
require realpath(dirname(__FILE__)) . "/../../utils/validators/hasData.php";
require realpath(dirname(__FILE__)) . "/../../utils/validators/db_types.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_status() === PHP_SESSION_ACTIVE ?: session_start();

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "add") {
            addProduct();

        } else if ($_GET['action'] == "edit" && isset($_GET['id'])) {
            editProduct($_GET['id']);

        } else if ($_GET['action'] == "delete" && isset($_POST["deleteProductId"])) {
            deleteProduct($_POST["deleteProductId"]);

        } else {
            die("Invalid action requested");
        }
    }
}

function addProduct()
{
    require realpath(dirname(__FILE__)) . "/../../utils/messages/msg.php";
    require realpath(dirname(__FILE__)) . "/../../repository/products.repository.php";

    try {
        $nombre = htmlspecialchars($_POST['nombre']);
        $imagen = htmlspecialchars($_POST['imagen']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $categoria = htmlspecialchars($_POST['categoria']);
        $precio = 500; //TODO: agregar input formulario
    } catch (Exception $e) {
        throw new ErrorException($e->getMessage());
    }

    if (!elementsHasData([$nombre, $imagen, $descripcion, $categoria])) {
        die("ERROR: " . $error_messages['!form_data']);
    }

    if (!varchar45($nombre)) {
        die("ERROR: " . $error_messages['!valid_length45']);
    }

    if (!varchar255($descripcion)) {
        die("ERROR: " . $error_messages['!valid_length255']);
    }

    $newProduct = [
        "nombre" => $nombre,
        "imagen" => $imagen,
        "idCategoria" => $categoria,
        "descripcion" => $descripcion,
        "precio" => $precio,
    ];
    $ProductExist = findOneProduct($newProduct['nombre']);
    if ($ProductExist) {
        die("ERROR: " . $error_messages['exist_product'] . ". ('" . $ProductExist['nombre'] . "')");
    }
    saveOneProduct($newProduct);
    header("Location:../../../pages/abm-productos.php");
}

function editProduct(string $productId)
{
    die("conchaaa");
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
