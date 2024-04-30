    function buscar_ahora(buscar) {
        if (buscar.trim() === '') {
            document.getElementById("resultados").style.display = "none";
            return;
        }

        var parametros = {"buscar":buscar};
        $.ajax({
            data: parametros,
            type: 'POST',
            url: '../php/buscador.php',
            success: function(data) {
                document.getElementById("resultados").style.display = "block";
                
                var listaResultados = document.getElementById("lista-resultados");
                listaResultados.innerHTML = data;

                var resultadosItems = listaResultados.getElementsByClassName('resultado');
                for (var i = 0; i < resultadosItems.length; i++) {
                    // Agregar evento clic
                    resultadosItems[i].addEventListener('click', function() {
                        var puesto = this.getAttribute('data-puesto');
                        window.location.href = 'Buscador.php?puesto=' + encodeURIComponent(puesto);
                    });

                    // Agregar evento mouseenter
                    resultadosItems[i].addEventListener('mouseenter', function() {
                        this.style.backgroundColor = '#f0f0f0'; // Cambiar el color de fondo al sombrear
                    });

                    // Agregar evento mouseleave
                    resultadosItems[i].addEventListener('mouseleave', function() {
                        this.style.backgroundColor = ''; // Restablecer el color de fondo al salir del sombreado
                    });
                }
            }
        });
    }

