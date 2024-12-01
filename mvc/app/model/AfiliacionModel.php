<?php
class AfiliacionModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function guardarAfiliacion($datos) {
        $sql = "INSERT INTO afiliaciones (nombre, apellido, dni, direccion, telefono, email, fecha_nacimiento) 
                VALUES (:nombre, :apellido, :dni, :direccion, :telefono, :email, :fecha_nacimiento)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($datos); 
        return $stmt->rowCount() > 0; // Devuelve true si se insertó al menos una fila

    }
    public function editarAfiliado($id_afiliado, $nombre, $apellido, $dni, $direccion, $telefono, $email, $fecha_nacimiento) {
        $sql = 'UPDATE afiliaciones 
                SET nombre = :nombre, 
                    apellido = :apellido, 
                    dni = :dni, 
                    direccion = :direccion, 
                    telefono = :telefono, 
                    email = :email, 
                    fecha_nacimiento = :fecha_nacimiento 
                WHERE id_afiliado = :id_afiliado';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':apellido', $apellido);
        $stmt->bindValue(':dni', $dni);
        $stmt->bindValue(':direccion', $direccion);
        $stmt->bindValue(':telefono', $telefono);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindValue(':id_afiliado', $id_afiliado); // Identificador único para actualizar una fila específica
        $stmt->execute();
    }

    public function eliminarAfiliado($id) {
        echo "ID de afiliado para eliminar: $id"; // Agregar para depurar
        try {
            $sql = 'DELETE FROM afiliaciones WHERE id_afiliado = :id_afiliado';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id_afiliado', $id);
            $stmt->execute();
    
            echo "Afiliado eliminado correctamente.";
        } catch (Exception $e) {
            echo "Error en eliminarAfiliado: " . $e->getMessage();
        }
    }
}
?>
