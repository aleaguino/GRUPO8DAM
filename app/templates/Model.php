<?php
class Model {
    private $db;

    // Constructor: establece la conexión con la base de datos.
    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=alimentos82024;charset=utf8', 'mygrupo8dad6', 'Q84tRmI0');
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }

    // Ejemplo: función para obtener todos los alimentos.
    public function getAlimentos() {
        $query = $this->db->query("SELECT * FROM alimentos");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ejemplo: función para insertar un alimento.
    public function insertarAlimento($nombre, $energia, $proteina, $hidratos, $fibra, $grasa) {
        $stmt = $this->db->prepare("INSERT INTO alimentos (nombre, energia, proteina, hidratocarbono, fibra, grasatotal) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$nombre, $energia, $proteina, $hidratos, $fibra, $grasa]);
    }
    // Ejemplo: función para actualizar un alimento.
    public function actualizarAlimento($id, $nombre, $energia, $proteina, $hidratos, $fibra, $grasa) {
        $stmt = $this->db->prepare("UPDATE alimentos SET nombre = ?, energia = ?, proteina = ?, hidratocarbono = ?, fibra = ?, grasatotal = ? WHERE id = ?");
        return $stmt->execute([$nombre, $energia, $proteina, $hidratos, $fibra, $grasa, $id]);
    }
    // Ejemplo: función para eliminar un alimento.
    public function eliminarAlimento($id) {
        $stmt = $this->db->prepare("DELETE FROM alimentos WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
}
?>
