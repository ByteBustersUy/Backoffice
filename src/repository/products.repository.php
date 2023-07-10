<?php


function findOneProduct(string $nombre): array
{
    require realpath(dirname(__FILE__))."/../db/conexion.php";
    try {
        $statement = $con->prepare("SELECT * FROM PRODUCTOS WHERE nombre = :nombre");
        $statement->execute(array(':nombre' => $nombre));
        $reg = $statement->fetch(PDO::FETCH_ASSOC);
        return $reg ? $reg : [];
    } catch (Exception $e) {
        die("ERROR SQL in findOneProduct(): ".$e->getMessage());
    }
}

function findAllProducts(): array
{
    require realpath(dirname(__FILE__))."/../db/conexion.php";
    try {
        $res = $con->query("SELECT * FROM PRODUCTOS ORDER BY nombre ASC");
        $reg = $res->fetchAll(PDO::FETCH_ASSOC);
        return $reg;
    } catch (Exception $e) {
        die("ERROR SQL in findAllProducts(): ".$e->getMessage());
    }
}

?>