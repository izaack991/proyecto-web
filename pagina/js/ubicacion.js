// function setCookie(nombre, valor, dias) {
// //alert('guardar');
// const fecha = new Date();
// fecha.setTime(fecha.getTime() + (dias * 24 * 60 * 60 * 1000));
// const expira = `expires=${fecha.toUTCString()}`;
// document.cookie = `${nombre}=${valor};${expira};path=/`;
// }

// function getCookie(nombre) {
// //alert('recuperar');
// const nombreCookie = `${nombre}=`;
// const cookies = document.cookie.split(';');
// for (let i = 0; i < cookies.length; i++) {
// let cookie = cookies[i].trim();
// if (cookie.startsWith(nombreCookie)) {
//   return cookie.substring(nombreCookie.length);
// }
// }
// return "";
// }

// // function eliminarCookie(nombre) {
// //     // Establece la fecha de expiración a una fecha pasada
// //     const fechaPasada = new Date(0);
// //     document.cookie = `${nombre}=; expires=${fechaPasada.toUTCString()}; path=/`;
// // }eliminarCookie("latitud");
// // eliminarCookie("longitud");

// // eliminarCookie("permiso");

// document.addEventListener('DOMContentLoaded', function() {
// if (!("geolocation" in navigator)) {
//     return alert("Tu navegador no soporta el acceso a la ubicación. Intenta con otro.");
// }

//  $latitud = document.getElementById("latitud");
//  $longitud = document.getElementById("longitud");

//  latitudGuardada = getCookie("latitud");
//  longitudGuardada = getCookie("longitud");
//  permiso = getCookie("permiso");
// //alert(permiso);

// if (permiso) {
//     //alert(`Ubicación guardada: Latitud: ${latitudGuardada}, Longitud: ${longitudGuardada}`);
//     $latitud.value = latitudGuardada;
//     $longitud.value = longitudGuardada;
//     console.log("Latitud guardada:", latitudGuardada);
//     console.log("Longitud guardada:", longitudGuardada);
// } else {
//     console.warn("Las cookies de ubicación no están establecidas. Solicitando ubicación...");
//    // alert(permiso);
//     obtenerUbicacion();
//     //alert(`Ubicación guardada: Latitud: ${latitudGuardada}, Longitud: ${longitudGuardada}`);

// }
// });
// function obtenerUbicacion() {
//alert("ubicacion");
if ("geolocation" in navigator) {
    // Solicitar la ubicación del usuario
    navigator.geolocation.getCurrentPosition(
        (ubicacion) => {
            // Este bloque se ejecuta si se concede el permiso y se obtiene la ubicación
            console.log("Ubicación obtenida: ", ubicacion);
            const coordenadas = ubicacion.coords;
            document.getElementById("latitud").value = coordenadas.latitude;
            document.getElementById("longitud").value = coordenadas.longitude;
            // Guardar las coordenadas en cookies
            // setCookie("latitud", coordenadas.latitude, 30);
            // setCookie("longitud", coordenadas.longitude, 30);
            // setCookie("permiso", 'si', 30);

        },
        (error) => {
            setCookie("permiso", 'si', 30);
            // Este bloque se ejecuta si el permiso es denegado o hay un error
            console.error("Error al obtener la ubicación: ", error.message);

            // Dependiendo del tipo de error, puedes mostrar un mensaje apropiado
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    console.error("Permiso de ubicación denegado por el usuario.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    console.error("Ubicación no disponible.");
                    break;
                case error.TIMEOUT:
                    console.error("La solicitud de ubicación expiró.");
                    break;
                default:
                    console.error("Error desconocido.");
                    break;
            }
        },
        {
            // Opcionalmente, puedes configurar opciones adicionales
            timeout: 10000, // Tiempo máximo para obtener la ubicación
            maximumAge: 60000, // Máximo tiempo de caché para la ubicación
            enableHighAccuracy: true, // Si se debe usar alta precisión
        }
    );
} else {
    console.error("La API de Geolocalización no está disponible en este navegador.");
}
//}