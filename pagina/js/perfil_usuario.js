$(document).ready(function() {
    mostrarExperiencia();
    
    function mostrarExperiencia() {
        // Hacer la llamada AJAX para obtener los datos de la base de datos
        $.ajax({
            url: '../php/perfil_usuario.php', // Cambia 'obtener_datos.php' por el archivo que maneje la consulta a la base de datos
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                input_exp = ""
                if (data.experiencia && data.experiencia.length > 0) {
                    $.each(data.experiencia, function (index, experiencia) {
                        input_exp += `<h3 class='text-dark'>`+experiencia.empresa+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Descripción de Puesto</span>
                                      <input id="descripcionexp`+experiencia.id_experiencia+`" type="text" class="form-control" value="`+experiencia.descripcion_puesto+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        input_exp += `<div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Empresa</span>
                                      <input id="empresaexp`+experiencia.id_experiencia+`" type="text" class="form-control" value="`+experiencia.empresa+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        input_exp += `<div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Periodo</span>
                                      <input id="periodoexp`+experiencia.id_experiencia+`" type="text" class="form-control" value="`+experiencia.periodo+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        input_exp += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-danger mb-3 w-100 btn-eliminar-exp" data-experiencia="`+experiencia.id_experiencia+`" style="font-size:1.2rem;">Eliminar</button></div><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-exp" data-experiencia="`+experiencia.id_experiencia+`" style="font-size:1.2rem;">Guardar</button></div></div>`
                    }); 
                } else {
                        input_exp = `<div class="row"><div class="col text-center"><p>Todavia no ha registrado ninguna experiencia laboral.</p></div></div>
                                    <div class="row"><div class="col text-center"><button type="button" id="btnAgregarexp" class="btn btn-primary w-100">Agregar</button></div></div>`;
                }
                $("#contenedorExperiencia").html(input_exp);
                
                input_for = ""
                
                if (data.formacion && data.formacion.length > 0) {
                    $.each(data.formacion, function (index, formacion) {
                        input_for += `<h3 class='text-dark'>`+formacion.descripcion+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Nombre de la Institución</span>
                                      <input id="descripcionfor`+formacion.id_formacion+`" type="text" class="form-control" value="`+formacion.descripcion+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        input_for += `<div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Ubicación</span>
                                      <input id="ubicacionfor`+formacion.id_formacion+`" type="text" class="form-control" value="`+formacion.ubicacion+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        input_for += `<div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Periodo</span>
                                      <input id="periodofor`+formacion.id_formacion+`" type="text" class="form-control" value="`+formacion.periodo+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        input_for += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-danger mb-3 w-100 btn-eliminar-for" data-formacion="`+formacion.id_formacion+`" style="font-size:1.2rem;">Eliminar</button></div><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-for" data-formacion="`+formacion.id_formacion+`" style="font-size:1.2rem;">Guardar</button></div></div>`
                    }); 
                } else {
                    input_for = `<div class="row"><div class="col text-center"><p>Todavia no ha registrado ninguna formación académica.</p></div></div>
                                <div class="row"><div class="col text-center"><button type="button" id="btnAgregarfor" class="btn btn-primary w-100">Agregar</button></div></div>`;
                }
                $("#contenedorFormacion").html(input_for);

                input_afi = ""
                
                if (data.aficion && data.aficion.length > 0) {
                    $.each(data.aficion, function (index, aficion) {
                        input_afi += `<h3 class='text-dark'>`+aficion.descripcion+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Descripción</span>
                                      <input id="descripcionafi`+aficion.id_aop+`" type="text" class="form-control" value="`+aficion.descripcion+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        input_afi += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-danger mb-3 w-100 btn-eliminar-afi" data-aficion="`+aficion.id_aop+`" style="font-size:1.2rem;">Eliminar</button></div><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-afi" data-aficion="`+aficion.id_aop+`" style="font-size:1.2rem;">Guardar</button></div></div>`
                    }); 
                } else {
                    input_afi = `<div class="row"><div class="col text-center"><p>Todavia no ha registrado ninguna afición.</p></div></div>
                                <div class="row"><div class="col text-center"><button type="button" id="btnAgregarafi" class="btn btn-primary w-100">Agregar</button></div></div>`;
                }
                $("#contenedorAficion").html(input_afi);

                input_int = ""
                
                if (data.interes && data.interes.length > 0) {
                    $.each(data.interes, function (index, interes) {
                        input_int += `<h3 class='text-dark'>`+interes.descripcion+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Descripción</span>
                                      <input id="descripcionint`+interes.id_di+`" type="text" class="form-control" value="`+interes.descripcion+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        input_int += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-danger mb-3 w-100 btn-eliminar-int" data-interes="`+interes.id_di+`" style="font-size:1.2rem;">Eliminar</button></div><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-int" data-interes="`+interes.id_di+`" style="font-size:1.2rem;">Guardar</button></div></div>`
                    }); 
                } else {
                    input_int = `<div class="row"><div class="col text-center"><p>Todavia no ha registrado ningun interés.</p></div></div>
                                <div class="row"><div class="col text-center"><button type="button" id="btnAgregarint" class="btn btn-primary w-100">Agregar</button></div></div>`;
                }
                $("#contenedorInteres").html(input_int);
                
                nom_usuario = ""
                input_nombre = ""
                
                if (data.usuario && data.usuario.length > 0) {
                    $.each(data.usuario, function (index, usuario) {
                        nom_usuario += usuario.nombre+` `+usuario.apellido;

                        input_nombre += `<h3 class='text-dark mb-3'>`+usuario.nombre+` `+usuario.apellido+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Nombre</span>
                                      <input id="nombreNom`+usuario.id_usuario+`" type="text" class="form-control" value="`+usuario.nombre+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        
                        input_nombre += `<div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Apellidos</span>
                                      <input id="apellidoNom`+usuario.id_usuario+`" type="text" class="form-control" value="`+usuario.apellido+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`

                        input_nombre += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-nombre" data-usuario="`+usuario.id_usuario+`" style="font-size:1.2rem;">Guardar</button></div></div>`
                    }); 
                } else {
                    input_nombre = `<div class="row"><div class="col text-center"><p>Todavia no ha registrado ningun interés.</p></div></div>
                                <div class="row"><div class="col text-center"><button type="button" id="btnAgregarint" class="btn btn-primary w-100">Agregar</button></div></div>`;
                }
                $("#nomUsuario").html(nom_usuario);
                $("#contenedorNombre").html(input_nombre);

                    card_video = ""
                if (data.video_curriculum && data.video_curriculum.length > 0) {
                    card_video += "<video class='w-100' controls>"
                    $.each(data.video_curriculum, function(index, video_curriculum) {
                        card_video += `<source src="`+video_curriculum.ruta_video+`" type="video/webm">
                                        <!-- Agrega soporte para navegadores que no pueden reproducir el formato webm -->
                                        <!-- <source src="`+video_curriculum.ruta_video+`" type="video/mp4"> -->
                                        Tu navegador no admite el elemento <code>video</code>.`;
                        card_video += "</video>"
                        card_video += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-danger mt-1 w-100 btn-eliminar-vid" data-video="`+video_curriculum.id_vid_curriculum+`" style="font-size:1.2rem;">Eliminar</button></div></div>`
                      });
                } else {
                    card_video = `<div class="row"><div class="col text-center"><p>Todavia no ha registrado ningun video curriculum.</p></div></div>
                                <div class="row"><div class="col text-center"><button type="button" id="btnAgregarvid" class="btn btn-primary w-100">Agregar</button></div></div>`;
                }
                $("#contenedorVideoCurriculum").html(card_video);
                
                input_pos = ""
                
                if (data.postulacion && data.postulacion.length > 0) {
                    $.each(data.postulacion, function (index, postulacion) {
                        input_pos += `<div class="list-group mb-1">
                            <a class="list-group-item border-gray" style="text-decoration:none;">
                            <div class="d-flex w-100 justify-content-between">
                                <h3 class="mb-2">`+postulacion.puesto+`</h3>
                                <h5 class="text-primary font-weight-bold">$`+postulacion.sueldo+`</h5>
                            </div>
                            <h4 class="mb-3">`+postulacion.empresa+`</h4>
                            <p class="mb-1 text-dark">`+postulacion.datos_adicionales+`</p>
                            </a>
                        </div>`

                        input_pos += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-danger mb-3 w-100 btn-eliminar-pos" data-postulacion="`+postulacion.id_postulacion+`" style="font-size:1.2rem;">Eliminar</button></div></div>`
                    }); 
                } else {
                    input_pos = `<div class="row"><div class="col text-center"><p>Todavia no ha registrado ninguna postulación.</p></div></div>
                                <div class="row"><div class="col text-center"><button type="button" id="btnAgregarpos" class="btn btn-primary w-100">Agregar</button></div></div>`;
                }
                $("#contenedorPostulacion").html(input_pos);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Manejar errores aquí
            }
        });
    }

    $(document).on("click", "#btnAgregarexp", function() {
        // Redirige a experiencia_laboral.php
        window.location.href = "experiencia_laboral.php";
    });
    $(document).on("click", "#btnAgregarfor", function() {
        // Redirige a experiencia_laboral.php
        window.location.href = "formacion_academica.php";
    });
    $(document).on("click", "#btnAgregarafi", function() {
        // Redirige a experiencia_laboral.php
        window.location.href = "aficiones.php";
    });
    $(document).on("click", "#btnAgregarint", function() {
        // Redirige a experiencia_laboral.php
        window.location.href = "interes.php";
    });
    $(document).on("click", "#btnAgregarvid", function() {
        // Redirige a experiencia_laboral.php
        window.location.href = "video_curriculum.php";
    });
    $(document).on("click", "#btnAgregarpos", function() {
        // Redirige a experiencia_laboral.php
        window.location.href = "buscar_vacantes.php.php";
    });

    // Agregar evento click a los botones "Guardar" de experiencia
    $(document).on("click", ".btn-guardar-exp", function() {
        var experienciaID = $(this).data("experiencia");
        var descripcion = $("#descripcionexp" + experienciaID).val();
        var empresa = $("#empresaexp" + experienciaID).val();
        var periodo = $("#periodoexp" + experienciaID).val();
        var tipo = 'exp';
        
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
                        id: experienciaID,
                        descripcion: descripcion,
                        empresa: empresa,   
                        periodo: periodo,
                        tipo: tipo
                    },
                    success: function(response) {
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
                        // Manejar errores aquí
                    }
                });
            }
        });
    });

    
    // Agregar evento click a los botones "Eliminar" de experiencia
    $(document).on("click", ".btn-eliminar-exp", function() {
        var experienciaID = $(this).data("experiencia");
        var tipo = 'exp';
        
        // Mostrar SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres eliminar esta experiencia laboral?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar datos al servidor utilizando AJAX
                $.ajax({
                    url: '../php/actualizar_perfil.php',
                    type: 'POST',
                    data: {
                        idexp: experienciaID,
                        tipo: tipo
                    },
                    success: function(response) {
                        mostrarExperiencia();
                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La experiencia laboral se eliminó correctamente.',
                            timer: 2000, // Duración en milisegundos (en este caso, 2 segundos)
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Manejar errores aquí
                    }
                });
            }
        }); 
    });

    // Agregar evento click a los botones "Guardar" de formacion
    $(document).on("click", ".btn-guardar-for", function() {
        var formacionID = $(this).data("formacion");
        var descripcion = $("#descripcionfor" + formacionID).val();
        var ubicacion = $("#ubicacionfor" + formacionID).val();
        var periodo = $("#periodofor" + formacionID).val();
        var tipo = 'for';
        
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
                        id: formacionID,
                        descripcion: descripcion,
                        ubicacion: ubicacion,
                        periodo: periodo,
                        tipo: tipo
                    },
                    success: function(response) {
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
                        // Manejar errores aquí
                    }
                });
            }
        });
    });

    // Agregar evento click a los botones "Eliminar" de formacion
    $(document).on("click", ".btn-eliminar-for", function() {
        var formacionID = $(this).data("formacion");
        var tipo = 'for';
        
        // Mostrar SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres eliminar esta formación académica?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar datos al servidor utilizando AJAX
                $.ajax({
                    url: '../php/actualizar_perfil.php', 
                    type: 'POST',
                    data: {
                        idfor: formacionID,
                        tipo: tipo
                    },
                    success: function(response) {
                        mostrarExperiencia();
                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La formación académica se eliminó correctamente.',
                            timer: 2000, // Duración en milisegundos (en este caso, 2 segundos)
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Manejar errores aquí
                    }
                });
            }
        });
    });

    // Agregar evento click a los botones "Guardar" de aficiones
    $(document).on("click", ".btn-guardar-afi", function() {
        var aficionID = $(this).data("aficion");
        var descripcion = $("#descripcionafi" + aficionID).val();
        var tipo = 'afi';
        
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
                        id: aficionID,
                        descripcion: descripcion,
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
                        // Manejar errores aquí
                    }
                });
            }
        });
    });

    // Agregar evento click a los botones "Eliminar" de aficiones
    $(document).on("click", ".btn-eliminar-afi", function() {
        var aficionID = $(this).data("aficion");
        var tipo = 'afi';
        
        // Mostrar SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres eliminar esta afición?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar datos al servidor utilizando AJAX
                $.ajax({
                    url: '../php/actualizar_perfil.php', 
                    type: 'POST',
                    data: {
                        idafi: aficionID,
                        tipo: tipo
                    },
                    success: function(response) {
                        
                        console.log(response);
                        mostrarExperiencia();
                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La afición se eliminó correctamente.',
                            timer: 2000, // Duración en milisegundos (en este caso, 2 segundos)
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Manejar errores aquí
                    }
                });
            }
        });
    });

    // Agregar evento click a los botones "Guardar" de intereses
    $(document).on("click", ".btn-guardar-int", function() {
        var interesID = $(this).data("interes");
        var descripcion = $("#descripcionint" + interesID).val();
        var tipo = 'int';
        
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
                        id2: interesID,
                        descripcion2: descripcion,
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

    // Agregar evento click a los botones "Eliminar" de intereses
    $(document).on("click", ".btn-eliminar-int", function() {
        var interesID = $(this).data("interes");
        var tipo = 'int';
        
        // Mostrar SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres eliminar esta afición?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar datos al servidor utilizando AJAX
                $.ajax({
                    url: '../php/actualizar_perfil.php', 
                    type: 'POST',
                    data: {
                        idint: interesID,
                        tipo: tipo
                    },
                    success: function(response) {
                        console.log(response);
                        mostrarExperiencia();
                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La afición se eliminó correctamente.',
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
    // Agregar evento click a los botones "Eliminar" de videos
    $(document).on("click", ".btn-eliminar-vid", function() {
        var videoID = $(this).data("video");
        var tipo = 'vid';
        
        // Mostrar SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres eliminar este video?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar datos al servidor utilizando AJAX
                $.ajax({
                    url: '../php/actualizar_perfil.php', 
                    type: 'POST',
                    data: {
                        idvid: videoID,
                        tipo: tipo
                    },
                    success: function(response) {
                        console.log(response);
                        mostrarExperiencia();
                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'El video se eliminó correctamente.',
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
    // Agregar evento click a los botones "Eliminar" de postulaciones
    $(document).on("click", ".btn-eliminar-pos", function() {
        var postulacionID = $(this).data("postulacion");
        var tipo = 'pos';
        
        // Mostrar SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres eliminar esta postulación?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar datos al servidor utilizando AJAX
                $.ajax({
                    url: '../php/actualizar_perfil.php', 
                    type: 'POST',
                    data: {
                        idpos: postulacionID,
                        tipo: tipo
                    },
                    success: function(response) {
                        console.log(response);
                        mostrarExperiencia();
                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La postulación se eliminó correctamente.',
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

    // Agregar evento click a los botones "Guardar" de nombre de usuario
    $(document).on("click", ".btn-guardar-nombre", function() {
        var usuarioID = $(this).data("usuario");
        var nombre = $("#nombreNom" + usuarioID).val();
        var apellido = $("#apellidoNom" + usuarioID).val();
        var tipo = 'nom';
        
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
                        usuarioID: usuarioID,
                        nombre: nombre,
                        apellido: apellido,
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
    
});
