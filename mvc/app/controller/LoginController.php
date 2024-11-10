<?php
require_once '/xampp/htdocs/hominis/mvc/app/model/LoginModel.php';

//HOLA ERIK, ESPERO QUE TE LLEGUE MI MENSAJE :)
class LoginController{
    private $model;
    

    public function __construct($pdo){
        $this->model = new LoginModel($pdo);
    }

    public function IniciarSesion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['user'] ?? '';
            $password = $_POST['password'] ?? '';
    
            $resultado = $this->model->ingreso($user, $password);
    
            if ($resultado) {
                session_set_cookie_params([
                    'secure' => true,
                    'httponly' => true,
                ]);
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
                var_dump($_SESSION);
    
                header('Location: http://localhost/hominis/mvc/resources/views/home.php');
            } else {
                header('Location: http://localhost/hominis/mvc/resources/views/login.php');
            }
            
            exit();
        }
    }

    public function CerrarSesion(){
        // Destruye todas las variables de sesión
        $_SESSION = array();

        // Si se desea destruir la sesión completamente, borra también la cookie de sesión
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
        );
        // Finalmente, destruye la sesión
        session_unset();
        session_destroy();
        // Redirige al usuario a la página de inicio de sesión
        header('Location: http://localhost/hominis/mvc/resources/views/login.php');
        exit();
        }
    } 
    }
?>