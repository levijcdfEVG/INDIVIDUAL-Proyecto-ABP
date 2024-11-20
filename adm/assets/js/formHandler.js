//Validacion de los campos del formulario
'use strict';

document.addEventListener('DOMContentLoaded', function () {
    const formulario = document.getElementById('formularioPrincipal');

    formulario.addEventListener('submit', function (event) {
        // Obtener los valores de los inputs
        const dni = document.querySelector('input[name="dni"]').value.trim();
        const nombreAlumno = document.querySelector('input[name="nombreAlumno"]').value.trim();
        const apellidoAlumno = document.querySelector('input[name="apellidoAlumno"]').value.trim();
        const correoAlumno = document.querySelector('input[name="correoAlumno"]').value.trim();

        // Validar DNI (mínimo 8 caracteres y máximo 12 por ejemplo)
        if (dni.length < 8 || dni.length > 12) {
            alert('El DNI debe tener entre 8 y 12 caracteres.');
            event.preventDefault(); // Prevenir el envío del formulario
            return;
        }

        // Validar nombre (mínimo 2 caracteres)
        if (nombreAlumno.length < 2) {
            alert('El nombre debe tener al menos 2 caracteres.');
            event.preventDefault();
            return;
        }

        // Validar apellido (mínimo 2 caracteres)
        if (apellidoAlumno.length < 2) {
            alert('El apellido debe tener al menos 2 caracteres.');
            event.preventDefault();
            return;
        }

        // Validar longitud del correo (mínimo 5 caracteres)
        if (correoAlumno.length < 5) {
            alert('El correo debe tener al menos 5 caracteres.');
            event.preventDefault();
            return;
        }
    });
});




