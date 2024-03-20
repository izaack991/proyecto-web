$(document).ready(function(){
    function mostrarDatos() {
        $.ajax({
            url: "../php/activacion.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                var table = "<table class='table table-hover'><thead class='bg-dark text-white'><tr><th class='text-center'>Nombre</th><th class='text-center'>Correo</th><th class='text-center'>Telefono</th><th class='text-center'>Razón Social</th><th class='text-center'>Acciones</th></thead></tr>";
                for (var i = 0; i < data.length; i++) {
                    table += "<tbody class='text-center'><tr><td>" + data[i].nombreEmpresa + "</td><td>" + data[i].correo + "</td><td>" + data[i].telefono + "</td><td>" + data[i].razon_social + "</td><td><button type='button' class='btn btn-info px-0 w-100' onclick='activar("+data[i].id_usuario+")'>Activar</button></td></tr></tbody>";
                }
                table += "</table>";
                $("#tablaEmpresa").html(table);
            }
        });
    }
    mostrarDatos();
    setInterval(mostrarDatos, 1000);
});

// Función para activar
function activar(index) {
    $.ajax({
        url: "../php/activacion.php",
        type: "POST",
        data: { index: index },
        success: function(response) {
            // Manejar la respuesta si es necesario
            Swal.fire({
                title: 'Éxito!',
                text: 'La empresa se activó correctamente.',
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


