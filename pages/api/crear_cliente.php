<?php
require_once "../models/cliente.php";

header("Content-Type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->nombre) && !empty($data->rfc)) {
    $cliente = new Cliente();
    $cliente->nombre = $data->nombre;
    $cliente->rfc = $data->rfc;
    $cliente->telefono = $data->telefono ?? "";
    $cliente->direccion = $data->direccion ?? "";

    if ($cliente->crearCliente()) {
        echo json_encode(["message" => "Cliente creado correctamente"]);
    } else {
        echo json_encode(["message" => "Error al crear cliente"]);
    }
} else {
    echo json_encode(["message" => "Datos incompletos"]);
}

// {
//     "nombre": "Eleazar Estrada",
//     "rfc": "EANE930421UZ9",
//     "telefono": "5555555555",
//     "direccion": "Carril MZ2 LT16 León 123, CDMX"
// }
    ?>