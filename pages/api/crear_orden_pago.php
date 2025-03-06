<?php
require_once "../models/OrdenPago.php";

header("Content-Type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->cotizacion_id)) {
    $orden = new OrdenPago();
    $orden->cotizacion_id = $data->cotizacion_id;
    $orden->estatus = $data->estatus ?? "pendiente"; // Por defecto, la orden queda pendiente

    if ($orden->crearOrden()) {
        echo json_encode(["message" => "Orden de pago creada correctamente"]);
    } else {
        echo json_encode(["message" => "Error al crear la orden de pago"]);
    }
} else {
    echo json_encode(["message" => "Datos incompletos"]);
}

// {
//     "cotizacion_id": 1,
//     "estatus": "pendiente"
// } 
?>