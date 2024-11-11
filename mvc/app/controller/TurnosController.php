<?php
require_once '/xampp/htdocs/hominis/mvc/app/model/TurnosModel.php';

class TurnosController {
    private $model;

    public function __construct($pdo) {
        $this->model = new TurnosModel($pdo);
    }

    public function index() {
        $especialidades = $this->model->obtenerEspecialidades();
        $afiliados = $this->model->obtenerAfiliados();
        $empleados = $this->model->obtenerEmpleados();
        require '/xampp/htdocs/hominis/mvc/resources/views/turnos.php';
    }

    public function crearTurno() {
        session_start();

        if (isset($_POST['afiliado_id'], $_POST['especialidad_id'], $_POST['fecha_turno'], $_POST['hora_turno'], $_POST['empleado_id'])) {
            $id_afiliado = $_POST['afiliado_id'];
            $especialidad_id = $_POST['especialidad_id'];
            $fecha_turno = $_POST['fecha_turno'];
            $hora_turno = $_POST['hora_turno'];
            $id_empleado = $_POST['empleado_id'];

            if ($this->model->crearTurno($id_afiliado, $especialidad_id, $fecha_turno, $hora_turno, $id_empleado)) {
                $_SESSION['mensaje'] = "Turno creado con éxito.";
                $_SESSION['tipo_mensaje'] = "success";
            } else {
                $_SESSION['mensaje'] = "Error al crear el turno.";
                $_SESSION['tipo_mensaje'] = "danger";
            }
        } else {
            $_SESSION['mensaje'] = "Faltan datos para crear el turno.";
            $_SESSION['tipo_mensaje'] = "warning";
        }

        header('Location: /hominis/mvc/index.php?action=listar_turnos');
        exit;
    }
}
?>