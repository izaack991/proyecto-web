$(document).ready(function() {
    mostrarExperiencia();
    
    function mostrarExperiencia() {
        // Hacer la llamada AJAX para obtener los datos de la base de datos
        $.ajax({
            url: '../php/perfil_usuario.php', // Cambia 'obtener_datos.php' por el archivo que maneje la consulta a la base de datos
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                
                // Ciclo each para mostrar los datos del usuario
                imagen_usuario = ""
                constancia_usuario = ""
                nom_usuario = ""
                correo_usuario = ""
                telefono_usuario = ""
                input_imagen = ""
                input_constancia = ""
                input_correo = ""
                input_nombre = ""
                input_telefono = ""

                    $.each(data.usuario, function (index, usuario) {
                        imagen_usuario += `<div class="image-container mx-auto"><img src="`+usuario.ruta_imagen+`"></div>`;
                        constancia_usuario += `<a class="text-info font-weight-bold" href="`+usuario.ruta_constancia+`" target="_blank">Ver Constancia</a>`;
                        nom_usuario += usuario.razon_social;
                        correo_usuario += usuario.correo;
                        telefono_usuario += usuario.telefono;
                        
                        input_imagen += `<label for="formFile" class="form-label text-primary font-weight-bold">Seleccionar Imagen de Perfil</label><input id="imagenInput" accept="image/png, image/jpeg, image/jpg" class="form-control" type="file"><br>`

                        input_imagen += `<div class="row"><div class="col text-center"><button type="submit" class="btn btn-info mb-3 w-100 btn-guardar-imagen" data-usuario="`+usuario.id_usuario+`" style="font-size:1.2rem;">Guardar</button></div></div>`

                        input_constancia += `<label for="formFile" class="form-label text-primary font-weight-bold">Seleccionar Constancia de Situación Fiscal</label><input id="constanciaInput" accept="image/png, image/jpeg, image/jpg, application/pdf" class="form-control" type="file"><br>`

                        input_constancia += `<div class="row"><div class="col text-center"><button type="submit" class="btn btn-info mb-3 w-100 btn-guardar-constancia" data-usuario="`+usuario.id_usuario+`" style="font-size:1.2rem;">Guardar</button></div></div>`

                        input_nombre += `<h3 class='text-dark mb-3'>`+usuario.razon_social+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Razón Social</span>
                                      <input id="nombreNom`+usuario.id_usuario+`" type="text" class="form-control" value="`+usuario.razon_social+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`

                        input_nombre += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-nombre" data-usuario="`+usuario.id_usuario+`" style="font-size:1.2rem;">Guardar</button></div></div>`

                        input_correo += `<h3 class='text-dark mb-3'>`+usuario.correo+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Correo</span>
                                      <input id="correoNom`+usuario.id_usuario+`" type="text" class="form-control" value="`+usuario.correo+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`

                        input_correo += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-correo" data-usuario="`+usuario.id_usuario+`" style="font-size:1.2rem;">Guardar</button></div></div>`

                        input_telefono += `<h3 class='text-dark mb-3'>`+usuario.telefono+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Teléfono</span>
                                      <input id="telefonoNom`+usuario.id_usuario+`" type="text" class="form-control" value="`+usuario.telefono+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`

                        input_telefono += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-telefono" data-usuario="`+usuario.id_usuario+`" style="font-size:1.2rem;">Guardar</button></div></div>`

                    });

                $("#imagenPerfil").html(imagen_usuario);
                $("#constanciaEmpresa").html(constancia_usuario);
                $("#nomUsuario").html(nom_usuario);
                $("#correoUsuario").html(correo_usuario);
                $("#telefonoUsuario").html(telefono_usuario);
                $("#contenedorImagenP").html(input_imagen);
                $("#contenedorConstancia").html(input_constancia);
                $("#contenedorNombre").html(input_nombre);
                $("#contenedorCorreo").html(input_correo);
                $("#contenedorTelefono").html(input_telefono);

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Manejar errores aquí
            }
        });
    }

    // Agregar evento click a los botones "Guardar" de nombre de usuario
    $(document).on("click", ".btn-guardar-nombre", function() {
        var usuarioID = $(this).data("usuario");
        var razon_social = $("#nombreNom" + usuarioID).val();
        var tipo = 'raz';

        // Verificar si la descripción está vacía
        if (razon_social.trim() === '') {
            // Mostrar SweetAlert de advertencia
            Swal.fire({
                icon: 'warning',
                title: 'Campo Vacío',
                text: 'No puedes dejar los campos vacíos.',
                confirmButtonText: 'Entendido'
            });
            return; // Detener la ejecución
        }
        
        // Mostrar SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres guardar los siguientes datos?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, guardar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar datos al servidor utilizando AJAX
                $.ajax({
                    url: '../php/actualizar_perfil.php', 
                    type: 'POST',
                    data: {
                        usuarioID7: usuarioID,
                        razon_social: razon_social,
                        tipo: tipo
                    },
                    success: function(response) {
                        console.log(response);
                        mostrarExperiencia();
                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La información se actualizó correctamente.',
                            timer: 2000, // Duración en milisegundos (en este caso, 2 segundos)
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });

    // Agregar evento click a los botones "Guardar" de correo de usuario
    $(document).on("click", ".btn-guardar-correo", function() {
        var usuarioID = $(this).data("usuario");
        var correo = $("#correoNom" + usuarioID).val();
        var tipo = 'cor';

        // Verificar si la descripción está vacía
        if (correo.trim() === '') {
            // Mostrar SweetAlert de advertencia
            Swal.fire({
                icon: 'warning',
                title: 'Campo Vacío',
                text: 'No puedes dejar los campos vacíos.',
                confirmButtonText: 'Entendido'
            });
            return; // Detener la ejecución
        }
        
        // Mostrar SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres guardar los siguientes datos?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, guardar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar datos al servidor utilizando AJAX
                $.ajax({
                    url: '../php/actualizar_perfil.php', 
                    type: 'POST',
                    data: {
                        usuarioID2: usuarioID,
                        correo: correo,
                        tipo: tipo
                    },
                    success: function(response) {
                        console.log(response);
                        mostrarExperiencia();
                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La información se actualizó correctamente.',
                            timer: 2000, // Duración en milisegundos (en este caso, 2 segundos)
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });

    // Agregar evento click a los botones "Guardar" de telefono
    $(document).on("click", ".btn-guardar-telefono", function() {
        var usuarioID = $(this).data("usuario");
        var telefono = $("#telefonoNom" + usuarioID).val();
        var tipo = 'tel';

        // Verificar si la descripción está vacía
        if (telefono.trim() === '') {
            // Mostrar SweetAlert de advertencia
            Swal.fire({
                icon: 'warning',
                title: 'Campo Vacío',
                text: 'No puedes dejar los campos vacíos.',
                confirmButtonText: 'Entendido'
            });
            return; // Detener la ejecución
        }
        
        // Mostrar SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres guardar los siguientes datos?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, guardar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar datos al servidor utilizando AJAX
                $.ajax({
                    url: '../php/actualizar_perfil.php', 
                    type: 'POST',
                    data: {
                        usuarioID3: usuarioID,
                        telefono: telefono,
                        tipo: tipo
                    },
                    success: function(response) {
                        console.log(response);
                        mostrarExperiencia();
                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La información se actualizó correctamente.',
                            timer: 2000, // Duración en milisegundos (en este caso, 2 segundos)
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });

    // Agregar evento click a los botones "Guardar" de constancia
    $(document).on("click", ".btn-guardar-constancia", function() {
        var usuarioID = $(this).data("usuario");
        var tipo = 'pdf';
        var formData = new FormData();
        var fileInput = $('#constanciaInput')[0].files[0]

        // Verificar si la descripción está vacía
        if (!fileInput) {
            // Mostrar SweetAlert de advertencia
            Swal.fire({
                icon: 'warning',
                title: 'Campo Vacío',
                text: 'No puedes dejar los campos vacíos.',
                confirmButtonText: 'Entendido'
            });
            return; // Detener la ejecución
        }
        
        // Obtener la extensión del archivo
        var extension = fileInput.name.split('.').pop();

        // Construir el nuevo nombre de archivo con la extensión original
        var nuevoNombre = 'csf_' + usuarioID + '.' + extension;

        formData.append('constancia', fileInput, nuevoNombre);
        formData.append('usuarioID8', usuarioID);
        formData.append('tipo', tipo);

        // Mostrar SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres guardar los siguientes datos?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, guardar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar datos al servidor utilizando AJAX
                $.ajax({
                    url: '../php/actualizar_perfil.php', 
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        mostrarExperiencia();
                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La información se actualizó correctamente.',
                            timer: 2000, // Duración en milisegundos (en este caso, 2 segundos)
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });

    // Agregar evento click a los botones "Guardar" de imagen de perfil
    $(document).on("click", ".btn-guardar-imagen", function() {
        var usuarioID = $(this).data("usuario");
        var tipo = 'img';
        var formData = new FormData();
        var fileInput = $('#imagenInput')[0].files[0]

        // Verificar si la descripción está vacía
        if (!fileInput) {
            // Mostrar SweetAlert de advertencia
            Swal.fire({
                icon: 'warning',
                title: 'Campo Vacío',
                text: 'No puedes dejar los campos vacíos.',
                confirmButtonText: 'Entendido'
            });
            return; // Detener la ejecución
        }
        
        // Obtener la extensión del archivo
        var extension = fileInput.name.split('.').pop();

        // Construir el nuevo nombre de archivo con la extensión original
        var nuevoNombre = 'pfp_' + usuarioID + '.' + extension;

        formData.append('imagen', fileInput, nuevoNombre);
        formData.append('usuarioID6', usuarioID);
        formData.append('tipo', tipo);

        // Mostrar SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres guardar los siguientes datos?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, guardar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar datos al servidor utilizando AJAX
                $.ajax({
                    url: '../php/actualizar_perfil.php', 
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        mostrarExperiencia();
                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La información se actualizó correctamente.',
                            timer: 2000, // Duración en milisegundos (en este caso, 2 segundos)
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
    
});
