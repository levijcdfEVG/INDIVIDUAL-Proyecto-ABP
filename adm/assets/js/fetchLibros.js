document.getElementById('curso').addEventListener('change',  function () {
    const cursoSeleccionado = this.value;

    if (cursoSeleccionado) {
        // Se realiza la solicitud AJAX (fetch)
        fetch('../adm/obtenerLibros.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'curso=' + encodeURIComponent(cursoSeleccionado) // Se envía el curso seleccionado
        })
        .then(response => response.text()) // Se cambia a .text() temporalmente
        .then(text => {
            console.log(text); // Se imprime la respuesta en texto
            return JSON.parse(text); // Se intenta parsear el texto manualmente
        })
        .then(data => {
            const selectLibros = document.getElementById('libros');
            selectLibros.innerHTML = ''; // Se limpian las opciones anteriores

            const opcionVacia = document.createElement('option');
            opcionVacia.value = '';
            opcionVacia.textContent = 'Seleccione un libro';
            selectLibros.appendChild(opcionVacia);

            if (data.length > 0) {
                data.forEach(libro => {
                    const opcion = document.createElement('option');
                    opcion.value = libro.value;
                    opcion.textContent = libro.text;
                    selectLibros.appendChild(opcion);
                });
            } else {
                const opcionSinLibros = document.createElement('option');
                opcionSinLibros.value = '';
                opcionSinLibros.textContent = 'No hay libros disponibles';
                selectLibros.appendChild(opcionSinLibros);
            }
        })
        .catch(error => {
            console.error('Error al obtener los libros:', error);
        });
    }
});
