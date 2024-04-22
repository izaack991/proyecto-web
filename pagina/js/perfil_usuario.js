$(document).ready(function() {
    mostrarExperiencia();
    
    function mostrarExperiencia() {
        // Hacer la llamada AJAX para obtener los datos de la base de datos
        $.ajax({
            url: '../php/perfil_usuario.php', // Cambia 'obtener_datos.php' por el archivo que maneje la consulta a la base de datos
            type: 'GET',
            dataType: 'json',
            success: function(data) {

                // Ciclo each para mostrar la experiencia laboral
                input_exp = ""
                if (data.experiencia && data.experiencia.length > 0) {
                    $.each(data.experiencia, function (index, experiencia) {
                        input_exp += `<h3 class='text-dark'>`+experiencia.empresa+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Descripción de Puesto</span>
                                      <input required id="descripcionexp`+experiencia.id_experiencia+`" type="text" class="form-control" value="`+experiencia.descripcion_puesto+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        input_exp += `<div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Empresa</span>
                                      <input id="empresaexp`+experiencia.id_experiencia+`" type="text" class="form-control" value="`+experiencia.empresa+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        input_exp += `<div class="row"><div class="col"><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Fecha Inicio</span>
                                      <input id="fechainicioexp`+experiencia.id_experiencia+`" type="date" class="form-control" value="`+experiencia.fechaInicio+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br></div>`
                        input_exp += `<div class="col"><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Fecha Final</span>
                                      <input id="fechafinexp`+experiencia.id_experiencia+`" type="date" class="form-control" value="`+experiencia.fechaFin+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br></div></div>`
                        input_exp += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-danger mb-3 w-100 btn-eliminar-exp" data-experiencia="`+experiencia.id_experiencia+`" style="font-size:1.2rem;">Eliminar</button></div><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-exp" data-experiencia="`+experiencia.id_experiencia+`" style="font-size:1.2rem;">Guardar</button></div></div>`
                    }); 
                } else {
                        input_exp = `<div class="row"><div class="col text-center"><p>Todavia no ha registrado ninguna experiencia laboral.</p></div></div>
                                    <div class="row"><div class="col text-center"><button type="button" id="btnAgregarexp" class="btn btn-primary w-100">Agregar</button></div></div>`;
                }
                $("#contenedorExperiencia").html(input_exp);
                
                // Ciclo each para mostrar la formacion academica
                input_for = ""
                
                if (data.formacion && data.formacion.length > 0) {
                    $.each(data.formacion, function (index, formacion) {
                        input_for += `<h3 class='text-dark'>`+formacion.descripcion+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Nombre de la Institución</span>
                                      <input id="descripcionfor`+formacion.id_formacion+`" type="text" class="form-control" value="`+formacion.descripcion+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        input_for += `<div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Ubicación</span>
                                      <input id="ubicacionfor`+formacion.id_formacion+`" type="text" class="form-control" value="`+formacion.ubicacion+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        input_for += `<div class="row"><div class="col"><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Fecha Inicio</span>
                                      <input id="fechainiciofor`+formacion.id_formacion+`" type="date" class="form-control" value="`+formacion.fechaInicio+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br></div>`
                        input_for += `<div class="col"><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Fecha Final</span>
                                      <input id="fechafinfor`+formacion.id_formacion+`" type="date" class="form-control" value="`+formacion.fechaFin+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br></div></div>`
                        input_for += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-danger mb-3 w-100 btn-eliminar-for" data-formacion="`+formacion.id_formacion+`" style="font-size:1.2rem;">Eliminar</button></div><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-for" data-formacion="`+formacion.id_formacion+`" style="font-size:1.2rem;">Guardar</button></div></div>`
                    }); 
                } else {
                    input_for = `<div class="row"><div class="col text-center"><p>Todavia no ha registrado ninguna formación académica.</p></div></div>
                                <div class="row"><div class="col text-center"><button type="button" id="btnAgregarfor" class="btn btn-primary w-100">Agregar</button></div></div>`;
                }
                $("#contenedorFormacion").html(input_for);

                // Ciclo each para mostrar la aficion
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

                // Ciclo each para mostrar el interes
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
                
                // Ciclo each para mostrar los datos del usuario
                nom_usuario = ""
                correo_usuario = ""
                region_usuario = ""
                domicilio_usuario = ""
                telefono_usuario = ""
                imagen_usuario = ""
                input_correo = ""
                input_region = ""
                input_nombre = ""
                input_domicilio = ""
                input_telefono = ""
                input_imagen = ""

                    $.each(data.usuario, function (index, usuario) {
                        imagen_usuario += `<div class="image-container mx-auto"><img src="`+usuario.ruta_imagen+`"></div>`;
                        nom_usuario += usuario.nombre+` `+usuario.apellido;
                        correo_usuario += usuario.correo;
                        region_usuario += usuario.pais;
                        telefono_usuario += usuario.telefono;
                        domicilio_usuario += usuario.domicilio;
                        
                        input_imagen += `<label for="formFile" class="form-label text-primary font-weight-bold">Seleccionar Imagen de Perfil</label><input id="imagenInput" accept="image/png, image/jpeg, image/jpg" class="form-control" type="file"><br>`

                        input_imagen += `<div class="row"><div class="col text-center"><button type="submit" class="btn btn-info mb-3 w-100 btn-guardar-imagen" data-usuario="`+usuario.id_usuario+`" style="font-size:1.2rem;">Guardar</button></div></div>`

                        input_nombre += `<h3 class='text-dark mb-3'>`+usuario.nombre+` `+usuario.apellido+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Nombre</span>
                                      <input id="nombreNom`+usuario.id_usuario+`" type="text" class="form-control" value="`+usuario.nombre+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`
                        
                        input_nombre += `<div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Apellidos</span>
                                      <input id="apellidoNom`+usuario.id_usuario+`" type="text" class="form-control" value="`+usuario.apellido+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`

                        input_nombre += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-nombre" data-usuario="`+usuario.id_usuario+`" style="font-size:1.2rem;">Guardar</button></div></div>`

                        input_correo += `<h3 class='text-dark mb-3'>`+usuario.correo+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Correo</span>
                                      <input id="correoNom`+usuario.id_usuario+`" type="text" class="form-control" value="`+usuario.correo+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`

                        input_correo += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-correo" data-usuario="`+usuario.id_usuario+`" style="font-size:1.2rem;">Guardar</button></div></div>`

                        input_telefono += `<h3 class='text-dark mb-3'>`+usuario.telefono+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Teléfono</span>
                                      <input id="telefonoNom`+usuario.id_usuario+`" type="text" class="form-control" value="`+usuario.telefono+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`

                        input_telefono += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-telefono" data-usuario="`+usuario.id_usuario+`" style="font-size:1.2rem;">Guardar</button></div></div>`

                        input_region += `<h3 class='text-dark mb-3'>`+usuario.pais+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Región</span>
                                      <select class="form-select w-auto" id="regionNom`+usuario.id_usuario+`">
                                        <option value="52">México</option>
                                        <option value="54">Argentina</option>
                                        <option value="591">Bolivia</option>
                                        <option value="55">Brasil</option>
                                        <option value="56">Chile</option>
                                        <option value="57">Colombia</option>
                                        <option value="506">Costa Rica</option>
                                        <option value="53">Cuba</option>
                                        <option value="593">Ecuador</option>
                                        <option value="503">El Salvador</option>
                                        <option value="1473">Granada</option>
                                        <option value="502">Guatemala</option>
                                        <option value="592">Guayana</option>
                                        <option value="509">Haití</option>
                                        <option value="504">Honduras</option>
                                        <option value="1876">Jamaica</option>
                                        <option value="505">Nicaragua</option>
                                        <option value="507">Panamá</option>
                                        <option value="595">Paraguay</option>
                                        <option value="51">Perú</option>
                                        <option value="1">Puerto Rico</option>
                                        <option value="1809">República Dominicana</option>
                                        <option value="597">Surinam</option>
                                        <option value="598">Uruguay</option>
                                        <option value="58">Venezuela</option>
                                      </select></div><br>`

                        input_region += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-region" data-usuario="`+usuario.id_usuario+`" style="font-size:1.2rem;">Guardar</button></div></div>`

                        input_domicilio += `<h3 class='text-dark mb-3'>`+usuario.domicilio+`</h3><div class="input-group"><span class="input-group-text rounded-0 text-white bg-primary font-weight-bold border-0" id="inputGroup-sizing-default">Domicilio</span>
                                      <input id="domicilioNom`+usuario.id_usuario+`" type="text" class="form-control" value="`+usuario.domicilio+`" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></div><br>`

                        input_domicilio += `<div class="row"><div class="col text-center"><button type="button" class="btn btn-info mb-3 w-100 btn-guardar-domicilio" data-usuario="`+usuario.id_usuario+`" style="font-size:1.2rem;">Guardar</button></div></div>`
                    });

                $("#imagenPerfil").html(imagen_usuario);
                $("#nomUsuario").html(nom_usuario);
                $("#correoUsuario").html(correo_usuario);
                $("#regionUsuario").html(region_usuario);
                $("#domicilioUsuario").html(domicilio_usuario);
                $("#telefonoUsuario").html(telefono_usuario);
                $("#contenedorImagenP").html(input_imagen);
                $("#contenedorNombre").html(input_nombre);
                $("#contenedorCorreo").html(input_correo);
                $("#contenedorTelefono").html(input_telefono);
                $("#contenedorRegion").html(input_region);
                $("#contenedorDomicilio").html(input_domicilio);



                // Ciclo each para mostrar el video curriculum
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
                
                // Ciclo each para mostrar la postulacion
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
        var fechaInicio = $("#fechainicioexp" + experienciaID).val();
        var fechafin = $("#fechafinexp" + experienciaID).val();
        var tipo = 'exp';

        // Verificar si la descripción está vacía
        if (descripcion.trim() === '' || empresa.trim() === '' || fechaInicio.trim() === '' || fechafin.trim() === '') {
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
                        id: experienciaID,
                        descripcion: descripcion,
                        empresa: empresa,   
                        fechaInicio: fechaInicio,
                        fechafin: fechafin,
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
        var fechaInicio = $("#fechainiciofor" + formacionID).val();
        var fechafin = $("#fechafinfor" + formacionID).val();
        var tipo = 'for';

        // Verificar si la descripción está vacía
        if (descripcion.trim() === '' || ubicacion.trim() === '' || fechaInicio.trim() === '' || fechafin.trim() === '') {
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
                        id: formacionID,
                        descripcion: descripcion,
                        ubicacion: ubicacion,
                        fechaInicio2: fechaInicio,
                        fechafin2: fechafin,
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
        
        // Verificar si la descripción está vacía
        if (descripcion.trim() === '') {
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

        // Verificar si la descripción está vacía
        if (descripcion.trim() === '') {
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

        // Verificar si la descripción está vacía
        if (nombre.trim() === '' || apellido.trim() === '') {
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

    // Agregar evento click a los botones "Guardar" de region
    $(document).on("click", ".btn-guardar-region", function() {
        var usuarioID = $(this).data("usuario");
        var region = $("#regionNom" + usuarioID).val();
        var tipo = 'reg';

        // Verificar si la descripción está vacía
        if (region.trim() === '') {
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
                        usuarioID4: usuarioID,
                        region: region,
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

    // Agregar evento click a los botones "Guardar" de domicilio
    $(document).on("click", ".btn-guardar-domicilio", function() {
        var usuarioID = $(this).data("usuario");
        var domicilio = $("#domicilioNom" + usuarioID).val();
        var tipo = 'dom';

        // Verificar si la descripción está vacía
        if (domicilio.trim() === '') {
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
                        usuarioID5: usuarioID,
                        domicilio: domicilio,
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
