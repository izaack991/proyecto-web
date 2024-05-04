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
                
                // Ciclo each para mostrar las vacantes
                input_vacante = ""
                
                if (data.vacante && data.vacante.length > 0) {
                    
                    $.each(data.vacante, function (index, vacante) {
                        input_vacante += `<div class="row"><div class="col"><li class="list-group-item d-flex justify-content-between align-items-center"><div>`
                        input_vacante += `<h5 class='text-primary'>`+vacante.puesto+`</h5>`
                        input_vacante += `<p class='text-dark'>`+vacante.datos_adicionales.substring(0, 200)+`...</h5>`
                        input_vacante += `</div><div class="ml-auto"><button data-bs-toggle="modal" data-bs-target="#modalVac`+vacante.id_vacante+`" class="border-0 bg-white text-secondary pl-2" style="outline:none;"><i class="fas fa-edit" style="font-size:1.3rem;"></i></button></div></li></div></div>`
                    });


                } else {
                    input_vacante += `<div class="row"><div class="col text-center"><p>Todavia no ha registrado ninguna vacante.</p></div></div>
                                <div class="row"><div class="col text-center"><button type="button" id="btnAgregarvac" class="btn btn-primary w-100">Agregar</button></div></div>`;
                }
                $("#containerVacantes").html(input_vacante);

                //Ciclo each para crear las modales de vacantes
                input_modal = ""

                $.each(data.vacante, function (index, vacante) {
                    input_modal += `<div class="modal fade" style="border-top-left-radius:25px;border-top-right-radius:25px;" id="modalVac`+vacante.id_vacante+`" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="border-radius:18px;">
                                                <div class="modal-header bg-primary" style="border-top-left-radius:18px;border-top-right-radius:18px;">
                                                    <h4 class="modal-title text-white"><b>EDITAR VACANTE</b></h4>
                                                    <button type="button" id="btncerrarmodal" class="close text-white" data-bs-dismiss="modal" aria-label="Close" style="outline:none;">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-floating mb-3 mt-2">
                                                        <input class="form-control w-100" id="txtpuesto`+vacante.id_vacante+`" type="text" value="`+vacante.puesto+`" placeholder="Descripcion de Puesto" maxLength="100" required="true">
                                                        <label for="floatingInput">Descripcion de Puesto *</label>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="input-group mt-2">
                                                                <label class="input-group-text bg-primary text-white border-0 font-weight-bold" style="border-top-right-radius:0px;border-bottom-right-radius:0px;height: 3.625rem; font-size:1.5rem;">$</label>
                                                                <div class="form-floating form-floating-group flex-grow-1">
                                                                    <input class="form-control" value="`+vacante.sueldo+`" type="text" required id="txtsueldo`+vacante.id_vacante+`" style="border-top-left-radius:0px;border-bottom-left-radius:0px;" name="txtsueldo" placeholder="Ingresa el Sueldo" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value < 0) this.value = '';" maxlength="10"> <br>
                                                                    <label for="floatingInput">Ingresa el Sueldo *</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md">
                                                            <div class="form-floating mt-2">
                                                                <select id="region`+vacante.id_vacante+`" class="form-select" name="cmbpais" style="width: 100%;">
                                                                `
                                                                
                                                                input_modal += `<option value="` + vacante.lugar + `">` + vacante.nombrePais + `</option>`;

                                                                // Iterar sobre los demás países
                                                                $.each(data.pais, function(index, pais){
                                                                    // Verificar si el país actual no es el mismo que el seleccionado para evitar duplicados
                                                                    if (pais.region != vacante.lugar) {
                                                                        input_modal += `<option value="` + pais.region + `">` + pais.nombre + `</option>`;
                                                                    }
                                                                });
                                                                input_modal += 
                                                                `
                                                                </select>
                                                                <label for="cmbpais" class="form_label">Pais *</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="form-floating" style="height:80px;">
                                                                <input class="form-control" value="`+vacante.region+`" type="text" required id="txtregion`+vacante.id_vacante+`" name="txtregion" style="width:244.81px;" placeholder="Ingresa el estado/region"> <br>
                                                                <label for="txtregion" class="form__label"> Estado/region *</label><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md">
                                                            <div class="form-floating" style="height:80px;">
                                                                <input class="form-control" value="`+vacante.ciudad+`" id="txtciudad`+vacante.id_vacante+`" type="text" required name="txtciudad" placeholder="Ingresa la ciudad/poblacion"> <br>
                                                                <label for="txtciudad" class="form__label"> Ciudad/Poblacion *</label><br>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label for="txtdatos" class="text-primary"> Datos Adicionales </label> <br>
                                                    <textarea name="txtdatos" id="txtdatos`+vacante.id_vacante+`"  style="resize:none; height: 300px;" type="text" class="form-control" cols="1" rows="10" placeholder="Ingresa los Datos">`+vacante.datos_adicionales+`</textarea><br>
                                                            
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-floating">
                                                                <input class="form-control" value="`+vacante.dateInicio+`" type="date" id="dateInicio`+vacante.id_vacante+`" required name="dateInicio" value="2024-01-01">
                                                                <label for="dateInicio">Fecha de Inicio: *</label><br>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-floating">
                                                                <input class="form-control" value="`+vacante.dateFin+`" type="date" id="dateFin`+vacante.id_vacante+`" required name="dateFin" value="2024-01-02">
                                                                <label for="dateFin">Fecha de Vencimiento *</label><br>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col text-center">
                                                            <button type="button" class="btn btn-info w-100 btn-guardar-vacante" data-vacante="`+vacante.id_vacante+`" style="font-size:1.2rem;">Guardar</button>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        ClassicEditor
                                                            .create(document.querySelector('#txtdatos`+vacante.id_vacante+`'), {
                                                                minHeight: '300px',
                                                                toolbar: ['undo', 'redo', '|', 'bold', 'italic', 'blockQuote', 'bulletedList', 'numberedList', '|', 'outdent', 'indent']
                                                            })
                                                            .then(editor => {
                                                                window.editor = editor;
                                                                // Escuchar el evento change del editor
                                                                editor.model.document.on('change:data', () => {
                                                                    // Obtener el texto del editor y establecerlo en el textarea original
                                                                    const editorData = editor.getData();
                                                                    document.querySelector('#txtdatos`+vacante.id_vacante+`').value = editorData;
                                                                });
                                                            })
                                                            .catch(error => {
                                                                console.error('Hubo un problema al instanciar el editor:', error);
                                                            });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`
                });
                $('#containerModales').html(input_modal);  
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Manejar errores aquí
            }
        });
    }
    $(document).on("click", "#btnAgregarvac", function() {
        // Redirige a vacante.php
        window.location.href = "vacante.php";
    });

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

    // Agregar evento click a los botones "Guardar" de las modales de vacantes
    $(document).on("click", ".btn-guardar-vacante", function() {
        var vacanteID = $(this).data("vacante");
        var puesto = $("#txtpuesto" + vacanteID).val();
        var sueldo = $("#txtsueldo" + vacanteID).val();
        var lugar = $("#region" + vacanteID).val();
        var region = $("#txtregion" + vacanteID).val();
        var ciudad = $("#txtciudad" + vacanteID).val();
        var datos = $("#txtdatos" + vacanteID).val();
        var fechainicio = $("#dateInicio" + vacanteID).val();
        var fechafin = $("#dateFin" + vacanteID).val();
        var tipo = 'vac';

        // Crear objeto FormData
        var formData = new FormData();

        // Agregar campos al formData
        formData.append('vacanteID', vacanteID);
        formData.append('puesto', puesto);
        formData.append('sueldo', sueldo);
        formData.append('lugar', lugar);
        formData.append('region', region);
        formData.append('ciudad', ciudad);
        formData.append('datos', datos);
        formData.append('fechainicio', fechainicio);
        formData.append('fechafin', fechafin);
        formData.append('tipo', tipo);

        // Verificar si la descripción está vacía
        if (puesto.trim() === '' || sueldo.trim() === '' || lugar.trim() === '' || region.trim() === '' || ciudad.trim() === '' || datos.trim() === '' || fechainicio.trim() === '' || fechafin.trim() === '') {
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
                    data: formData,
                    processData: false, // Evitar que jQuery procese los datos
                    contentType: false, // Evitar que jQuery configure automáticamente 
                    success: function(response) {
                        // Mostrar SweetAlert de éxito
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'La información se actualizó correctamente.',
                            timer: 1000, // Duración en milisegundos (en este caso, 2 segundos)
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then((result) => {
                            // Este código se ejecutará después de que el usuario cierre el SweetAlert
                            location.reload();
                            mostrarExperiencia();
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
    
});
