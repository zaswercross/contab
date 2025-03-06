<?php
require_once "../config/Database.php";

class Producto {
    private $conn;
    private $table_name = "inventario";

    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function crearProducto() {
        $query = "INSERT INTO " . $this->table_name . " (nombre, descripcion, precio, stock) VALUES (:nombre, :descripcion, :precio, :stock)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":stock", $this->stock);

        return $stmt->execute();
    }
}
?>
