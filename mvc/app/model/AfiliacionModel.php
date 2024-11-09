<?php
class AfiliacionModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function guardarAfiliacion($datos) {
        $sql = "INSERT INTO afiliaciones (nombre, apellido, dni, direccion, telefono, email, fecha_nacimiento) 
                VALUES (:nombre, :apellido, :dni, :direccion, :telefono, :email, :fecha_nacimiento)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($datos); 
        return $stmt->rowCount() > 0; // Devuelve true si se insertó al menos una fila

    }

    public function editarAfiliado($id){
        $sql = 
    }

    public function eliminarAfiliado($dni){
        $sql = 'DELETE FROM afiliaciones WHERE dni = :dni';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':dni', $dni);  // Víncula el valor directamente
        $stmt->execute();
    }    
}