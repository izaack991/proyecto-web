{
    $(document).ready(function () {
        $('#formExperienciaLaboral').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#formExperienciaLaboral')[0]);
            //var formData = $(this).serialize();
            $.ajax({
                url: '../php/experiencia_laboral.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "true") {
                        Swal.fire({
                            title: 'Listo!',
                            text: 'Elemento Guardado',
                            icon: 'success'
                        }).then(function () {
                            window.location.href = "../templates/experiencia_laboral.php";
                        });
                    } else if (response == "errorSave") {
                        Swal.fire({
                            title: 'Error!',
                            text: 'No se ha guardado el elemento',
                            icon: 'error'
                        }).then(function () {
                            window.location.href = "../templates/experiencia_laboral.php";
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        })
    })
};

{
    $(document).ready(function () {
        $('#formFormacionAcademica').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#formFormacionAcademica')[0]);
            //var formData = $(this).serialize();
            $.ajax({
                url: '../php/formacion_academica.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "true") {
                        Swal.fire({
                            title: 'Listo!',
                            text: 'Elemento Guardado',
                            icon: 'success'
                        }).then(function () {
                            window.location.href = "../templates/formacion_academica.php";
                        });
                    } else if (response == "errorSave") {
                        Swal.fire({
                            title: 'Error!',
                            text: 'No se ha guardado el elemento',
                            icon: 'error'
                        }).then(function () {
                            window.location.href = "../templates/formacion_academica.php";
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        })
    })
};

{
    $(document).ready(function () {
        $('#formAficiones').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#formAficiones')[0]);
            //var formData = $(this).serialize();
            $.ajax({
                url: '../php/Aficiones.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "true") {
                        Swal.fire({
                            title: 'Listo!',
                            text: 'Elemento Guardado',
                            icon: 'success'
                        }).then(function () {
                            window.location.href = "../templates/aficiones.php";
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        })
    })
};
{
    $(document).ready(function () {
        $('#formInteres').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#formInteres')[0]);
            $.ajax({
                url: '../php/interes.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "true") {
                        Swal.fire({
                            title: '¡Listo!',
                            text: 'Elemento Guardado',
                            icon: 'success'
                        }).then(function () {
                            window.location.href = "../templates/interes.php";
                        });
                    } else if (response == "errorSave") {
                        Swal.fire({
                            title: '¡Error!',
                            text: '¡No se ha guardado el elemento!',
                            icon: 'error'
                        }).then(function () {
                            window.location.href = "../templates/interes.php";
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        })
    })
};
{
    $(document).ready(function () {
        $('#formCleaver').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($('#formCleaver')[0]);
            $.ajax({
                url: '../php/test_cleaver.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Maneja la respuesta del archivo PHP aquí
                    console.log(response);
                    if (response == "true") {
                        Swal.fire({
                            title: '¡Completado!',
                            text: 'Respuestas Guardadas',
                            icon: 'success'
                        }).then(function () {
                            window.location.href = "../templates/test_cleaver.php";
                        });
                    } else if (response == "errorSave") {
                        Swal.fire({
                            title: '¡Error!',
                            text: '¡No se pudieron guardar sus respuestas!',
                            icon: 'error'
                        }).then(function () {
                            window.location.href = "../templates/test_cleaver.php";
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Maneja cualquier error que ocurra durante la solicitud AJAX
                    console.error(error);
                }
            });
        })
    })
};