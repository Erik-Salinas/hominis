<?php
class ModificarTurnosModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerTurnos() {
        $stmt = $this->pdo->prepare("SELECT * FROM turnos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTurnoPorId($id_turno) {
        $stmt = $this->pdo->prepare("SELECT * FROM turnos WHERE id_turno = ?");
        $stmt->execute([$id_turno]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerEspecialidades() {
        $stmt = $this->pdo->prepare("SELECT * FROM especialidades");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerEmpleados() {
        $stmt = $this->pdo->prepare("SELECT * FROM empleado");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerAfiliados() {
        $stmt = $this->pdo->prepare("SELECT * FROM afiliaciones");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarTurno($id_turno, $id_afiliado, $id_especialidad, $fecha_turno, $hora_turno, $id_empleado) {
        try {
            $stmt = $this->pdo->prepare("UPDATE turnos SET 
                id_afiliado = ?, 
                id_especialidad = ?, 
                fecha_turno = ?, 
                hora_turno = ?, 
                id_empleado = ? 
                WHERE id_turno = ?");
            
            $stmt->execute([$id_afiliado, $id_especialidad, $fecha_turno, $hora_turno, $id_empleado, $id_turno]);

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al actualizar el turno: " . $e->getMessage();
            return false;
        }
    }
public function eliminarTurno($id_turno) {
    try {
        // Consulta para eliminar el turno
        $query = "DELETE FROM turnos WHERE id_turno = :id_turno";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_turno', $id_turno, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        // Manejo de errores
        return false;
    }
}
} 
?>


