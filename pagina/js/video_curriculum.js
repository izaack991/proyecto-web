function guardarVideo() {
    // Obtener el elemento de video guardado
    var videoElement = document.getElementById('videoGuardado');

    // Crear un objeto FormData para enviar el video al servidor
    var formData = new FormData();
    formData.append('video', videoElement.src);

    // Enviar el video al servidor mediante una petición AJAX con jQuery
    $.ajax({
        url: '../php/video_curriculum.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // El video se guardó exitosamente
            alert('El video se ha guardado correctamente.');
            location.reload();
        },
        error: function () {
            // Ocurrió un error al guardar el video
            alert('Error al guardar el video.');
        }
    });
}