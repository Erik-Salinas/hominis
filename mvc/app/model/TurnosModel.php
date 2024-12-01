<?php
class TurnosModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerAfiliados() {
        $stmt = $this->pdo->prepare("SELECT id_afiliado, nombre, apellido FROM afiliaciones");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerEspecialidades() {
        $stmt = $this->pdo->prepare("SELECT id, nombre FROM especialidades");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerEmpleados() {
        $stmt = $this->pdo->prepare("SELECT id_empleado, nombre, apellido FROM empleado");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearTurno($id_afiliado, $especialidad_id, $fecha_turno, $hora_turno, $id_empleado) {
        if (empty($id_afiliado) || empty($especialidad_id) || empty($fecha_turno) || empty($hora_turno) || empty($id_empleado)) {
            return false;
        }

        $stmt = $this->pdo->prepare("INSERT INTO turnos (id_afiliado, id_especialidad, fecha_turno, hora_turno, id_empleado) 
                                    VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$id_afiliado, $especialidad_id, $fecha_turno, $hora_turno, $id_empleado]);
    }

    public function obtenerTurnosPorAfiliado($id_afiliado) {
        $stmt = $this->pdo->prepare("SELECT t.id_turno, e.nombre AS especialidad, t.fecha_turno, t.hora_turno 
                                    FROM turnos t 
                                    JOIN especialidades e ON t.id_especialidad = e.id 
                                    WHERE t.id_afiliado = ?");
        $stmt->execute([$id_afiliado]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
