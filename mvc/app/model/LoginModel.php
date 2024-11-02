<?php
class LoginModel{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function ingreso($user, $password) {
        $sql = "SELECT * FROM nombre_tabla WHERE user = :user AND password = :password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user' => $user, 'password' => $password]);


        // Retorna verdadero si se encuentra al menos un registro
        return $stmt->fetch() !== false;
    }
}
?>