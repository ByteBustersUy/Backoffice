<?php
require realpath(dirname(__FILE__))."/../../utils/validators/roles/isVendedor.php";
if (!$isVendedor) {
    header("Location:../pages/login.php");
    exit;
}

if($_POST){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $imagen = $_POST['imagen'];
    
    require realpath(dirname(__FILE__))."/../../repository/products.repository.php";
    
    if(findOneProduct($nombre)){
        die("El producto con nombre " . $nombre . " ya existe");
    }
}


function getProductsTableData(): string
{
    require realpath(dirname(__FILE__))."/../../repository/products.repository.php";
    $productsData = findAllProducts();
    $productsList = '';
    foreach ($productsData as $product) {
        $imagen = substr($product['imagen'], 7);
        $productsList .= '
                            <tr>
                                <td><a href="?id=' . $product['id'] . '">' . $product['nombre'] . '</a></td>
                                <td><a href="?id=' . $product['id'] . '">' . $product['imagen'] . '</a></td>
                                <td><a href="?id=' . $product['id'] . '">' . $imagen . '</a></td>
                                <td><a href="?id=' . $product['id'] . '">' . $product['imagen'] . '</a></td>
                            </tr>';
    }
    return $productsList;
}



?>