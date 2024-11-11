<?php
class LoginModel{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function ingreso($user, $password) {
        $sql = "SELECT * FROM `empleado` WHERE user = :user AND password = :password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user' => $user, 'password' => $password]);
        return $stmt->fetch() !== false;
    }
}
?>