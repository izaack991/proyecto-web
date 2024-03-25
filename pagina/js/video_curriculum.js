// Función para enviar el video a través de AJAX
function guardarVideo() {
    // Crear un FormData para enviar el video como archivo
    var formData = new FormData();
    formData.append('video', blobVideo);

    // Enviar el video a través de AJAX
    $.ajax({
        type: 'POST',
        url: '../php/video_curriculum.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Muestra un SweetAlert indicando que el Video Curriculum se ha guardado con éxito
            Swal.fire({
                title: '¡Éxito!',
                text: 'Video Curriculum guardado con éxito',
                icon: 'success',
                timer: 2000, // Tiempo en milisegundos para cerrar automáticamente la alerta
                timerProgressBar: true, // Muestra una barra de progreso del tiempo restante
                showConfirmButton: false // No muestra el botón de confirmación
            }).then((result) => {
                window.location.href = "indexPrincipal.php";
            });
        },
        error: function(xhr, status, error) {
            console.error("Error al guardar el video en la base de datos:", error);
        }
    });
}