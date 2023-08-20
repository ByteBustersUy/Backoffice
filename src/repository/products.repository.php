<?php
function findOneProduct(string $nombre): array
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT * FROM PRODUCTOS WHERE nombre = :nombre");
        $statement->execute(array(':nombre' => $nombre));
        $reg = $statement->fetch(PDO::FETCH_ASSOC);
        return $reg ? $reg : [];
    } catch (Exception $e) {
        die("ERROR SQL in findOneProduct(): " . $e->getMessage());
    }
}

function findAllProducts(): array
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    try {
        $res = $con->query("SELECT * FROM PRODUCTOS ORDER BY nombre ASC");
        $reg = $res->fetchAll(PDO::FETCH_ASSOC);
        return $reg ? $reg : [];
    } catch (Exception $e) {
        die("ERROR SQL in findAllProducts(): " . $e->getMessage());
    }
}

function findAllCategories(): array
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    try {
        $res = $con->query("SELECT * FROM CATEGORIAS ORDER BY id ASC");
        $reg = $res->fetchAll(PDO::FETCH_ASSOC);
        return $reg ? $reg : [];
    } catch (Exception $e) {
        die("ERROR SQL in findAllCategories(): " . $e->getMessage());
    }
}

function findLastProductId(): string
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    try {
        $res = $con->query("SELECT id FROM PRODUCTOS ORDER BY id DESC");
        $reg = $res->fetch(PDO::FETCH_ASSOC);
        return $reg['id'] ? $reg['id'] : '';
    } catch (Exception $e) {
        die("ERROR SQL in findLastProductId(): " . $e->getMessage());
    }
}

function findCategoryIdByName(string $name): string
{

    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT id FROM CATEGORIAS WHERE nombre = :nombre");
        $statement->execute(array(':nombre' => $name));
        $reg = $statement->fetch(PDO::FETCH_ASSOC);
        return $reg['id'] ? $reg['id'] : '';
    } catch (Exception $e) {
        die("ERROR SQL in findCategoryIdByName(): " . $e->getMessage());
    }
}


function findProductCategoryByProductId(string $productId): string
{

    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT CATEGORIAS_id FROM PRODUCTOS_has_CATEGORIAS WHERE PRODUCTOS_id = :productId");
        $statement->execute(array(':productId' => $productId));
        $reg = $statement->fetch(PDO::FETCH_ASSOC);

        if (!empty($reg)) {
            $statement = $con->prepare("SELECT nombre FROM CATEGORIAS WHERE id = :categoryId");
            $statement->execute(array(':categoryId' => $reg['CATEGORIAS_id']));
            $reg = $statement->fetch(PDO::FETCH_ASSOC);
            return $reg['nombre'] ? $reg['nombre'] : '';
        }

        return '';
    } catch (Exception $e) {
        die("ERROR SQL in findProductCategoryByProductId(): " . $e->getMessage());
    }
}
function findProductPromotionStatus(string $productId): bool
{

    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT PROMOCIONES_id FROM PRODUCTOS_has_PROMOCIONES WHERE PRODUCTOS_id = :productId");
        $statement->execute(array(':productId' => $productId));
        $reg = $statement->fetch(PDO::FETCH_ASSOC);

        return $reg ? true : false;
    } catch (Exception $e) {
        die("ERROR SQL in findProductPromotionStatus(): " . $e->getMessage());
    }
}

function saveOneProduct(array $newProduct): bool
{
    require realpath(dirname(__FILE__)) . "/../db/conexion.php";
    include realpath(dirname(__FILE__)) . "/../utils/messages/msg.php";
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    
    try {
        $lastProductId = findLastProductId();
        $statement = $con->prepare("INSERT INTO PRODUCTOS (nombre,descripcion,imagen,precio,USUARIO_ci) VALUES (:nombre, :descripcion, :imagen, :precio, :USUARIO_ci)");
        $res = $statement->execute([
            ':nombre' => $newProduct['nombre'],
            ':descripcion' => $newProduct['descripcion'],
            ':imagen' => $newProduct['imagen'],
            ':precio' => $newProduct['precio'],
            ':USUARIO_ci' => $_SESSION['userCi'],
        ]);

        if ($res == 1) {
            $newProductId = findLastProductId();
            try {
                $statement = $con->prepare("INSERT INTO PRODUCTOS_has_CATEGORIAS (PRODUCTOS_id,CATEGORIAS_id) VALUES (:prodId, :catId)");
                $statement->execute([
                    ':prodId' => $newProductId,
                    ':catId' => $newProduct['idCategoria']
                ]);
                return true;
            } catch (Exception $e) {

                if ($newProductId > $lastProductId) {

                    $statement = $con->prepare("DELETE FROM PRODUCTOS WHERE id = :id");
                    $statement->execute([
                        ':id' => $newProductId
                    ]);
                }
                die($e->getMessage());
            }
        } else {
            die("ERROR: " . $error_messages['!product_add']);
        }
    } catch (Exception $e) {
        die("ERROR SQL in saveOneProduct(): " . $e->getMessage());
    }
}
