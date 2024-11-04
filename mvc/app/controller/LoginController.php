<?php
require_once '/xampp/htdocs/hominis/mvc/app/model/LoginModel.php';

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
                header('Location: http://localhost/hominis/mvc/index.php?home');
            } else {
                header('Location: http://localhost/hominis/mvc/resources/views/login.php');
            }
            
            exit();
        }
    }
    
}
?>