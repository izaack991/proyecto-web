$(document).ready(function() {
    // Función para verificar el estado del permiso de geolocalización
    function verificarPermisoGeolocalizacion() {
      navigator.permissions.query({ name: 'geolocation' }).then(function(permissionStatus) {
        if (permissionStatus.state === 'denied') {
          // Si el permiso está denegado, mostrar una modal
          $('#modalPermiso').modal('show');
        } else if (permissionStatus.state === 'prompt') {
          // Si el permiso está en estado "Ask (Default)", mostrar una modal
          $('#modalPermiso').modal('show');
        }
      });
    }
  
    // Verificar el permiso de geolocalización al cargar la página
    verificarPermisoGeolocalizacion();
  
    // Verificar el permiso de geolocalización después de cerrar la modal
    $('#modalPermiso').on('hidden.bs.modal', function() {
      verificarPermisoGeolocalizacion();
    });
  
    // Evento del botón Recargar
    $('#btnRecargar').on('click', function() {
      // Recargar la página
      location.reload();
    });
  });
  
  