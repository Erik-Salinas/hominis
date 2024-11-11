<?php
require_once '/xampp/htdocs/hominis/mvc/config/datebase.php';
require_once '/xampp/htdocs/hominis/mvc/app/controller/LoginController.php';
require_once '/xampp/htdocs/hominis/mvc/app/controller/AfiliacionController.php';
require_once '/xampp/htdocs/hominis/mvc/app/controller/TurnosController.php';
require_once '/xampp/htdocs/hominis/mvc/app/controller/ModificarTurnosController.php';

$controller = new LoginController($pdo);
$afiliacion = new AfiliacionController($pdo);
$turnosController = new TurnosController($pdo);
$modificarTurnosController = new ModificarTurnosController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['formulario'])) {
        switch ($_POST['formulario']) {
            case 'login':
                $controller->IniciarSesion();
                break;
            case 'afiliacion':
                $afiliacion->procesarFormulario();
                break;
            case 'turno':
                $turnosController->crearTurno();
                break;
            case 'actualizar_turno':
                $modificarTurnosController->actualizarTurno();
                break;
        }
    }
} elseif (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'logout':
            $controller->CerrarSesion();
            break;
        case 'turnos':
            $turnosController->index();
            break;
        case 'listar_turnos':
            $modificarTurnosController->index();
            break;
        case 'editar_turno':
            if (isset($_GET['id_turno'])) {
                $modificarTurnosController->editarTurno($_GET['id_turno']);
            }
            break;
        case 'eliminar_turno':
            if (isset($_GET['id_turno'])) {
                $modificarTurnosController->eliminarTurno($_GET['id_turno']);
            }
            break;
        default:
            include '/xampp/htdocs/hominis/mvc/resources/views/login.php';
            break;
    }
} elseif (isset($_GET['home'])) {
    include '/xampp/htdocs/hominis/mvc/resources/views/home.php';
} else {
    include '/xampp/htdocs/hominis/mvc/resources/views/login.php';
}
?>