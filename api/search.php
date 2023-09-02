
<?php
include "conexion.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    try {
        $data = json_decode(file_get_contents('php://input'), true);
        $value = $data['value'];
        $res = $con->query("SELECT * FROM PRODUCTOS WHERE nombre LIKE '%$value%' ");
        $reg = $res->fetchAll(PDO::FETCH_ASSOC);
        if ($reg) {
            header("Content-Type: application/json");
            echo json_encode($reg, JSON_PRETTY_PRINT);
        }
    } catch (Exception $e) {
        // die("ERROR SQL in findAllProducts(): " . $e->getMessage());
    }
}
