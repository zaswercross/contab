<?php
require_once "../models/Producto.php";

header("Content-Type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->nombre) && isset($data->precio) && isset($data->stock)) {
    $producto = new Producto();
    $producto->nombre = $data->nombre;
    $producto->descripcion = $data->descripcion ?? "";
    $producto->precio = $data->precio;
    $producto->stock = $data->stock;

    if ($producto->crearProducto()) {
        echo json_encode(["message" => "Producto agregado correctamente"]);
    } else {
        echo json_encode(["message" => "Error al agregar producto"]);
    }
} else {
    echo json_encode(["message" => "Datos incompletos"]);
}



//{
//     "nombre": "Laptop Dell Inspiron",
//     "descripcion": "Laptop Dell con 16GB RAM y SSD 512GB",
//     "precio": 18999.99,
//     "stock": 10
// }

?>