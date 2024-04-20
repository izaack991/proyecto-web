function SeleccionarChat() {
    // Obtener el elemento <li> que se hizo clic
    var listItem = event.target.closest("li");

    // Deseleccionar todos los elementos <li> que estén seleccionados actualmente
    var selectedItems = document.querySelectorAll(".list-group-item.selected-item");
    selectedItems.forEach(function(item) {
        item.classList.remove("selected-item");
    });

    // Seleccionar el elemento <li> que se hizo clic
    listItem.classList.add("selected-item");

    // Llamar a la función cargarMensajes
    cargarMensajes();

}
  
$(document).ready(function() {
    // Hacer la solicitud AJAX al cargar la página
    obtenerConversaciones();

    function obtenerConversaciones() {
        $.ajax({
            url: '../php/conversaciones.php', // Ruta al script PHP que obtiene las conversaciones
            type: 'POST',
            data: { valor: 1 }, // Datos que se enviarán al servidor
            dataType: 'json', // Esperamos recibir datos en formato JSON
            success: function(response) {
                // Manejar la respuesta del servidor
                mostrarConversaciones(response);
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener conversaciones:', error);
            }
        });
    }
    
    function mostrarConversaciones(conversaciones) {
        // Limpiar la lista de conversaciones
        $('.list-group').empty();

        // Iterar sobre las conversaciones recibidas y agregarlas a la lista
        conversaciones.forEach(function(conversacion) {
            var listItem = `
                <li class="list-group-item d-flex align-items-center" onclick="SeleccionarChat(event)">
                    <img src="../../assets/images/usernoprofile.png" class="rounded-circle img-thumbnail" alt="Imagen de perfil" style="width: 50px; height: 50px; margin-right: 10px;">
                    <div>
                        <strong>${conversacion.nombre}</strong>
                        <br>
                        <small>${conversacion.mensaje}</small>
                    </div>
                </li>
            `;
            $('.list-group').append(listItem);
        });
    }
});


