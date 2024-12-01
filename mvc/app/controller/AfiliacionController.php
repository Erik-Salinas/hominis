<?php
require_once '/xampp/htdocs/hominis/mvc/app/model/AfiliacionModel.php';

class AfiliacionController
{
    private $modelo;

    public function __construct($pdo)
    {
        $this->modelo = new AfiliacionModel($pdo);
    }

    // Procesa el formulario de afiliación
    public function procesarFormulario()
    {
        // Validar y sanitizar los datos
        $datos = [
            'nombre' => htmlspecialchars($_POST['nombre']),
            'apellido' => htmlspecialchars($_POST['apellido']),
            'dni' => htmlspecialchars($_POST['dni']),
            'direccion' => htmlspecialchars($_POST['direccion']),
            'telefono' => htmlspecialchars($_POST['telefono']),
            'email' => htmlspecialchars($_POST['email']),
            'fecha_nacimiento' => htmlspecialchars($_POST['fecha_nacimiento'])
        ];

        // Llamar al modelo para guardar la afiliación
        $resultado = $this->modelo->guardarAfiliacion($datos);

        if ($resultado) {
            // Redirige a la misma página pero con un parámetro para mostrar la modal
            header('Location: http://localhost/hominis/mvc/resources/views/affiliates.php?modal=1');
            exit();
        } else {
            echo "Error al procesar la afiliación.";
        }
    }

    public function editar(){

        $dni = htmlspecialchars($_POST['dni']);

        $resultado = $this->modelo->editarAfiliado($dni);
        if ($resultado) {
            // Redirige a la misma página pero con un parámetro para mostrar la modal
            header('Location: http://localhost/hominis/mvc/resources/views/record.php');
            // Almacenamos un mensaje de éxito en la sesión y redirigimos
            $_SESSION['mensaje'] = "Afiliación procesada correctamente.";
            header('Location: /hominis/mvc/app/views/record.php');
            exit();
        } else {
            // En caso de error, mostramos un mensaje
            $_SESSION['mensaje'] = "Error al procesar la afiliación. El DNI o el email pueden estar duplicados.";
            header('Location: /hominis/mvc/app/views/affiliates.php');
            exit();
        }
    }

    // Edita los datos de un afiliado existente
    public function editarDatos($id_afiliado,$nombre, $apellido, $dni,$direccion,$telefono,$email,$fecha_nacimiento)
    {
            $resultado = $this->modelo->editarAfiliado($id_afiliado,$nombre, $apellido, $dni,$direccion,$telefono,$email,$fecha_nacimiento);

            if ($resultado) {
                // Si la actualización es exitosa
                $_SESSION['mensaje'] = "Datos actualizados correctamente.";
                header('Location: /hominis/mvc/app/views/affiliates.php');
                exit();
            } else {
                // Si hay error
                $_SESSION['mensaje'] = "Error al actualizar los datos.";
                header('Location: /hominis/mvc/app/views/affiliates.php');
                exit();
            }
    }

    // Elimina un afiliado por ID
    public function eliminar($id)
    {
        // Intentar eliminar el afiliado
        if ($this->modelo->eliminarAfiliado($id)) {
            $_SESSION['mensaje'] = "Afiliado eliminado correctamente.";
        } else {
            $_SESSION['mensaje'] = "No se pudo eliminar el afiliado.";
        }
        // Redirigir a la lista de afiliados
        header('Location: /hominis/mvc/app/views/affiliates.php');
        exit();
    }
}
?>
