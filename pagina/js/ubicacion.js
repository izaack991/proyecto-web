document.addEventListener('DOMContentLoaded', function() {
    //alert('alerta');
    if (!("geolocation" in navigator)) {
        return alert("Tu navegador no soporta el acceso a la ubicación. Intenta con otro");
    }

    const $latitud = document.getElementById("latitud"),
        $longitud = document.getElementById("longitud"),
        $enlace = document.querySelector("#enlace");

    // Obtener las coordenadas guardadas en las cookies, si existen
    const latitudGuardada = getCookie("latitud");
    const longitudGuardada = getCookie("longitud");
	//alert(longitudGuardada);
	//alert(latitudGuardada);
    if (latitudGuardada && longitudGuardada) {
        // Si las coordenadas están guardadas en las cookies, usarlas
        $latitud.value = latitudGuardada;
        $longitud.value = longitudGuardada;
    } else {
        // Si no hay coordenadas guardadas en las cookies, solicitar la ubicación al usuario
        const onUbicacionConcedida = ubicacion => {
            console.log("Tengo la ubicación: ", ubicacion);
            const coordenadas = ubicacion.coords;
            $latitud.value = coordenadas.latitude;
            $longitud.value = coordenadas.longitude;
            // Guardar las coordenadas en cookies
            setCookie("latitud", coordenadas.latitude, 365);
            setCookie("longitud", coordenadas.longitude, 365);
            // Actualizar la cookie para indicar que se ha concedido el permiso
            setCookie("permisoUbicacion", "si", 365);
        }

        const onErrorDeUbicacion = err => {
            $latitud.value = "Error obteniendo ubicación: " + err.message;
            $longitud.value = "Error obteniendo ubicación: " + err.message;
            console.log("Error obteniendo ubicación: ", err);
        }

        const opcionesDeSolicitud = {
            enableHighAccuracy: true, // Alta precisión
            maximumAge: 0, // No queremos caché
            timeout: 5000 // Esperar solo 5 segundos
        };

        $latitud.value = "Cargando...";
        $longitud.value = "Cargando...";
        navigator.geolocation.getCurrentPosition(onUbicacionConcedida, onErrorDeUbicacion, opcionesDeSolicitud);
    }
});

// Función para establecer una cookie
function setCookie(nombre, valor, dias) {
    var fecha = new Date();
    fecha.setTime(fecha.getTime() + (dias * 24 * 60 * 60 * 1000));
    var expira = "expires=" + fecha.toUTCString();
    document.cookie = nombre + "=" + valor + ";" + expira + ";path=/";
}

// Función para obtener el valor de una cookie
function getCookie(nombre) {
    var nombreCookie = nombre + "=";
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        while (cookie.charAt(0) == ' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(nombreCookie) == 0) {
            return cookie.substring(nombreCookie.length, cookie.length);
        }
    }
    return "";
}
