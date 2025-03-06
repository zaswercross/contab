<?php
require_once "../config/Database.php";

class OrdenPago {
    private $conn;
    private $table_name = "ordenes_pago";

    public $cotizacion_id;
    public $estatus;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function crearOrden() {
        $query = "INSERT INTO " . $this->table_name . " (cotizacion_id, estatus) VALUES (:cotizacion_id, :estatus)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":cotizacion_id", $this->cotizacion_id);
        $stmt->bindParam(":estatus", $this->estatus);

        return $stmt->execute();
    }
}
?>
