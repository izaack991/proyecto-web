    // Tiempo de inactividad en milisegundos (por ejemplo, 5 minutos)
    var tiempoInactividad = 10 * 60 * 1000; 

    // Página a la que se redireccionará después de la inactividad
    var paginaRedireccion = "https://www.workele.com";

    var tiempoInactivo;

    // Función para redireccionar
    function redireccionar() {
      $.ajax({
        url: '../php/logout.php', // La URL del archivo PHP
        type: 'POST', // Método HTTP (GET, POST, etc.)
      });
      window.location.href = 'https://www.workele.com';
    }

    // Reiniciar el temporizador de inactividad
    function reiniciarTemporizador() {
      clearTimeout(tiempoInactivo);
      tiempoInactivo = setTimeout(redireccionar, tiempoInactividad);
    }

    // Cuando se cargue la página, iniciar el temporizador
    reiniciarTemporizador();

    // Reiniciar el temporizador si se detecta actividad
    document.addEventListener("mousemove", reiniciarTemporizador);
    document.addEventListener("keypress", reiniciarTemporizador);