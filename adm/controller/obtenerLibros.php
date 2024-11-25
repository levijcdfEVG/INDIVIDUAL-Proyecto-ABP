<?php
require 'adm/model/configdb.php';
require 'adm/controller/classes/FormHandler.php';

header('Content-Type: application/json');

// Se verifica si el valor 'curso' fue enviado en la solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['curso'])) {
    $curso = $_POST['curso'];  // Se toma el valor del curso
    $validaciones = new FormHandler($conexion);  // Se instancia la clase de validaciones

    // Se usa el método de la clase para obtener los libros relacionados al curso
    $libros = $validaciones->obtenerLibrosPorCurso($curso);

    if (is_array($libros)) {
        echo json_encode($libros);  // Se envían los libros como respuesta en formato JSON
    } else {
        echo json_encode(["error" => "No se encontraron libros para este curso"]);
    }
} else {
    echo json_encode(["error" => "Curso no válido o no enviado"]);
}
