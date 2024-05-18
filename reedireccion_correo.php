<form id="formSeleccionarVacante" action="http://localhost/proyecto-web/pagina/templates/seleccionar_vacantes.php" method="post" style="display: none;">
    <input type="hidden" name="id_vacante" id="id_vacante_input">
</form>

<script>
    window.onload = function() {
        // Ejecutar automáticamente la función al cargar la página
        seleccionarVacanteFromLink();
    };

    function seleccionarVacanteFromLink() {
        // Obtener el id_vacante de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const idVacante = urlParams.get('id_vacante');

        // Verificar si se encontró el parámetro en la URL
        if (idVacante !== null) {
            // Colocar el valor de idVacante en el campo oculto del formulario
            document.getElementById("id_vacante_input").value = idVacante;
            // Envía el formulario
            document.getElementById("formSeleccionarVacante").submit();
        } else {
            alert("No se encontró el parámetro id_vacante en la URL.");
        }
    }
</script>