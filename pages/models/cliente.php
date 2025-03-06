<?php
require_once "../config/Database.php";

class Cliente {
    private $conn;
    private $table_name = "clientes";

    public $razonSocial;
    public $rfc;
    public $telefono;
    public $direccion;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function crearCliente() {
        $query = "INSERT INTO " . $this->table_name . " (razonSocial, rfc, telefono, direccion) VALUES (:razonSocial, :rfc, :telefono, :direccion)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":razonSocial", $this->nombre);
        $stmt->bindParam(":rfc", $this->rfc);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":direccion", $this->direccion);

        return $stmt->execute();
    }
}
?>
