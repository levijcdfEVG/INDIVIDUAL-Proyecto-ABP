<?php 

//Se llaman las dependecias de esta aplicación
require '../modeloDeDatos/configdb.php';
require 'Reservas.php';

//Se realiza la reserva con metodos de un objeto de la clase Reservas
$reserva = new Reservas($conexion);
$mensaje = $reserva->realizarReserva($_POST['dni'], $_POST['nombreAlumno'], $_POST['apellidoAlumno'], $_POST['correoAlumno'], $_POST['cursoASeleccionar'], $_POST['libroASeleccionar'], $_POST['estadoDelPago']);
echo $mensaje;
