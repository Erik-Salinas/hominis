<?php
require_once '/xampp/htdocs/hominis/mvc/app/model/ModificarTurnosModel.php';

class ModificarTurnosController {
    private $model;

    public function __construct($pdo) {
        $this->model = new ModificarTurnosModel($pdo);
    }

    public function index() {
        $turnos = $this->model->obtenerTurnos();
        $especialidades = $this->model->obtenerEspecialidades();
        $empleados = $this->model->obtenerEmpleados();

        require '/xampp/htdocs/hominis/mvc/resources/views/listar_turnos.php';
    }

    public function editarTurno($id_turno) {
        $turno = $this->model->obtenerTurnoPorId($id_turno);
        $especialidades = $this->model->obtenerEspecialidades();
        $empleados = $this->model->obtenerEmpleados();
        $afiliados = $this->model->obtenerAfiliados();
        
        require '/xampp/htdocs/hominis/mvc/resources/views/editar_turno.php';
    }

public function actualizarTurno() {
    if (isset($_POST['id_turno'], $_POST['id_afiliado'], $_POST['id_especialidad'], $_POST['fecha_turno'], $_POST['hora_turno'], $_POST['id_empleado'])) {
        $id_turno = $_POST['id_turno'];
        $id_afiliado = $_POST['id_afiliado'];
        $id_especialidad = $_POST['id_especialidad'];
        $fecha_turno = $_POST['fecha_turno'];
        $hora_turno = $_POST['hora_turno'];
        $id_empleado = $_POST['id_empleado'];

        if ($this->model->actualizarTurno($id_turno, $id_afiliado, $id_especialidad, $fecha_turno, $hora_turno, $id_empleado)) {
            $_SESSION['mensaje'] = "Turno actualizado con éxito.";
        } else {
            $_SESSION['mensaje'] = "Error al actualizar el turno.";
        }
        header('Location: /hominis/mvc/index.php?action=listar_turnos');
        exit;
    } else {
        $_SESSION['mensaje'] = "Faltan datos para actualizar el turno.";
        header('Location: /hominis/mvc/index.php?action=listar_turnos');
        exit;
    }
}
public function eliminarTurno($id_turno) {
    if ($this->model->eliminarTurno($id_turno)) {
        $_SESSION['mensaje'] = "Turno eliminado correctamente.";
    } else {
        $_SESSION['mensaje'] = "No se pudo eliminar el turno.";
    }
    header('Location: /hominis/mvc/index.php?action=listar_turnos');
    exit;
}
}
?>

