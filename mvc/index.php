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

// Verifica si la solicitud es POST y de qué formulario proviene

if ($_SERVER['REQUEST_METHOD'] === 'POST'  && $_GET['action'] === 'editarDatos') {
    $id_afiliado = $_POST['id_afiliado'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    
    $afiliacion->editarDatos($id_afiliado,$nombre, $apellido, $dni,$direccion,$telefono,$email,$fecha_nacimiento);

}elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
}elseif (isset($_GET['action'])) {
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
        case 'delet':
            if(isset($_GET['id'])){
                $afiliacion->eliminar($_GET['id']);
            }
            break;
        case 'editarDatos':
            $afiliacion->editarDatos();
            break;

        default:
            include '/xampp/htdocs/hominis/mvc/app/views/login.php';
            break;
    }
} elseif (isset($_GET['home'])) {
    include '/xampp/htdocs/hominis/mvc/app/views/home.php';
} else {
    include '/xampp/htdocs/hominis/mvc/app/views/login.php';
}
?>

