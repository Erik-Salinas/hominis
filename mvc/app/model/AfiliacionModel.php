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
    public function editarAfiliado($id,$dni, $nombre, $apellido, $direccion, $telefono, $email, $fecha_nacimiento) {
        $sql = 'UPDATE afiliaciones SET nombre = :nombre, apellido = :apellido, direccion = :direccion, telefono = :telefono, email = :email, fecha_nacimiento = :fecha_nacimiento,dni = :dni WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':dni', $dni);
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':apellido', $apellido);
        $stmt->bindValue(':direccion', $direccion);
        $stmt->bindValue(':telefono', $telefono);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':fecha_nacimiento', $fecha_nacimiento);
        
        $stmt->execute();
        
        // Verifica cuántas filas fueron afectadas
        var_dump($stmt->rowCount());
    }
    
    

    public function eliminarAfiliado($dni){
        $sql = 'DELETE FROM afiliaciones WHERE dni = :dni';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':dni', $dni);  // Víncula el valor directamente
        $stmt->execute();
    }    
}