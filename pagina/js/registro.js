{
    $(document).ready(function () {
          $('#miFormulario').submit(function (event) {
            event.preventDefault();

                var formData = new FormData($('#miFormulario')[0]);
                //var formData = $(this).serialize();

                $.ajax({
                    url: '../php/Usuario.php',
                    method: 'POST', // o 'GET' dependiendo de lo que necesites
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // Maneja la respuesta del archivo PHP aquí
                        console.log(response);
                        if (response == "true1") {
                            Swal.fire({
                                title: 'Listo!',
                                text: 'Usuario Guardado',
                                icon: 'success'
                            }).then(function() {
                                window.location.href = "../templates/login.php?xd=1";
                            });
                        } else if (response == "true2"){
                            Swal.fire({
                                title: 'Listo!',
                                text: 'Usuario Guardado',
                                icon: 'success'
                            }).then(function() {
                                window.location.href = "../templates/login.php?xd=2";
                            });
                        } else if (response == "errorPassword") {
                            Swal.fire('¡Las Contraseñas NO coinciden!');
                        } else if (response == "errorImagenEmpresa") {
                            Swal.fire('¡No subió la Imagen de la Empresa!');
                        } else if (response == "ErrorImagen") {
                            Swal.fire({
                                title: 'Error!',
                                text: 'La extensión o el tamaño de los archivos no es correcta. Solo se permite: .gif, .jpg, .png. y de 200 kb como máximo.',
                                icon: 'error'});
                        } else if (response == "errorImagenServer") {
                            Swal.fire({
                                title: 'Error!',
                                text: 'No se pudo subir la imagen al sevidor.',
                                icon: 'error'});
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'No se guardó el usuario',
                                icon: 'error'
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