{
    $(document).ready(function () {
          $('#miFormulario').submit(function (event) {
            event.preventDefault();

                var formData = new FormData($('#miFormulario')[0]);
                //var formData = $(this).serialize();

                $.ajax({
                    url: '../php/Aficiones.php',
                    method: 'POST', // o 'GET' dependiendo de lo que necesites
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // Maneja la respuesta del archivo PHP aquí
                        console.log(response);
                        if (response == "true") {
                            Swal.fire({
                                title: 'Listo!',
                                text: 'Usuario Guardado',
                                icon: 'success'
                            }).then(function() {
                                window.location.href = "../templates/login.php?xd=1";
                            });
                        }

                    },
                    error: function (xhr, status, error) {
                        // Maneja cualquier error que ocurra durante la solicitud AJAX
                        console.error(error);
                    }
                });
            }

        )
    }
    )}
;