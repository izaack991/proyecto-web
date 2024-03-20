$(document).ready(function(){
    function mostrarDatos() {
        $.ajax({
            url: "../php/postulacion.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                var table = "<table class='table table-hover'><thead class='bg-dark text-white'><tr><th class='text-center'>Usuario</th><th class='text-center'>Correo</th><th class='text-center'>Vacante</th><th class='text-center'>Acciones</th></thead></tr>";
                for (var i = 0; i < data.length; i++) {
                    table += "<tbody class='text-center'><tr><td>" + data[i].nombreUsuario + "</td><td>" + data[i].correo + "</td><td>" + data[i].puesto + "</td><td><button type='button' class='btn btn-danger' style='margin-right:15px;' onclick='cerrar("+data[i].id_postulacion+")'>Cerrar</button><button type='button' class='btn btn-info' onclick='ver("+data[i].id_postulacion+","+data[i].id_usuario+")'>Ver Curriculum</button></td></tr></tbody>";
                }
                table += "</table>";
                $("#tablaUsuarios").html(table);
            }
        });
    }
    mostrarDatos();
    setInterval(mostrarDatos, 1000);
});

// Función para cerrar
function cerrar(index) {
    $.ajax({
        url: "../php/postulacion.php",
        type: "POST",
        data: { index: index },
        success: function(response) {
            // Manejar la respuesta si es necesario
            Swal.fire({
                title: 'Éxito!',
                text: 'La postulación se cerró correctamente.',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000, // Tiempo en milisegundos (3 segundos)
                timerProgressBar: true,
                onClose: () => {
                    clearInterval(timerInterval);
                }
            });
            // Volver a cargar los datos para reflejar los cambios
            mostrarDatos();
        },
        error: function(xhr, status, error) {
            // Manejar errores si es necesario
            alert("Error al cerrar el registro.");
            console.error(xhr, status, error);
        }
    });
}

// Función para ver el curriculum
function ver(id_postulacion, id_usuario) {
    $.ajax({
        url: "../php/seleccionar_postulacion.php",
        type: "POST",
        data: { id_postulacion: id_postulacion, id_usuario: id_usuario },
        success: function(response) {
            // Manejar la respuesta si es necesario
            console.log("Datos enviados correctamente.");
            // Redirigir a otro HTML con parámetros en la URL
            window.location.href = 'seleccionar_postulacion.php?id_postulacion=' + id_postulacion + '&id_usuario=' + id_usuario;
        },
        error: function(xhr, status, error) {
            // Manejar errores si es necesario
            alert("Error al ver el curriculum.");
            console.error(xhr, status, error);
        }
    });
}

