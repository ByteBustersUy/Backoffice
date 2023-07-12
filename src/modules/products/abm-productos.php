<?php
require realpath(dirname(__FILE__))."/../../utils/validators/roles/isVendedor.php";
if (!$isVendedor) {
    header("Location:../pages/login.php");
    exit;
}

if($_POST){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $idCategoria = $_POST['categoria'];
    $imagen = $_POST['imagen'];
    
    require realpath(dirname(__FILE__))."/../../repository/products.repository.php";
    
    if(findOneProduct($nombre)){
        die("El producto con nombre " . $nombre . " ya existe");
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
    require realpath(dirname(__FILE__))."/../../repository/products.repository.php";
    $productsData = findAllProducts();
    $productsList = '';
    foreach ($productsData as $product) {
        $category = findProductCategoryByProductId($product['id']);
        $isPromo = findProductPromotionStatus($product['id']);
        $isPromo == 1? $isPromo = "Si" : $isPromo = "No";
        $productsList .= '
                            <tr>
                                <td class="first-in-table"><a href="?id=' . $product['id'] . '">' . $product['nombre'] . '</a></td>
                                <td><a class="center" href="?id=' . $product['id'] . '">' . $category . '</a></td>
                                <td><a class="center" href="?id=' . $product['id'] . '">' . $product['imagen'] . '</a></td>
                                <td><a class="center" href="?id=' . $product['id'] . '">' . $isPromo . '</a></td>
                                <td class="align-middle"><button class="btn-eye"><i class="fa-solid fa-eye"></i></button></td>
                            </tr>';
    }
    return $productsList;
}

function getOptionsCategoriesHTML(): string { 

    $categories = findAllCategories();
    $options = '';
    foreach ($categories as $category){
        $options .='<option value="'.$category['id'].'">'.$category['nombre'].'</option>';
    }
    return $options;
}



?>