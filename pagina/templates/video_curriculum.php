<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Video Curriculum</title>
        <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
        <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
        <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
        <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
        <script src="../js/notificacion_usuario.js"></script>
        <script src="../js/video_curriculum.js"></script>
    
        <script>
            // Tiempo de inactividad en milisegundos (por ejemplo, 5 minutos)
            var tiempoInactividad = 5 * 60 * 1000; 

            // Página a la que se redireccionará después de la inactividad
            var paginaRedireccion = "index.php";

            var tiempoInactivo;

            // Función para redireccionar
            function redireccionar() {
            window.location.href = paginaRedireccion;
            }

            // Reiniciar el temporizador de inactividad
            function reiniciarTemporizador() {
            clearTimeout(tiempoInactivo);
            tiempoInactivo = setTimeout(redireccionar, tiempoInactividad);
            }

            // Cuando se cargue la página, iniciar el temporizador
            reiniciarTemporizador();

            // Reiniciar el temporizador si se detecta actividad
            document.addEventListener("mousemove", reiniciarTemporizador);
            document.addEventListener("keypress", reiniciarTemporizador);
        </script>

        <style>
            .pregresp {
                border: 1px solid #20c997;
                padding: 10px;
                margin: 10px;
                border-radius: 0.4rem;
            }
        </style>
    </head>

    <body style="background-color: #F8F6F3;">

        <!-- {*Barra de navegacion para Usuarios*} -->
        <?php include("navbar_usuario.php") ?>

        <!-- Card de aficiones -->
        <div class="container-fluid">
            <div class="card shadow mb-3" style="max-width: 50rem; margin:auto; margin-top:30px; border-radius:25px;">
                <div class="card-header text-center bg-primary" style="border-top-left-radius:25px;border-top-right-radius:25px;">
                    <h2 class="text-white">VIDEO CURRICULUM</h2>
                </div>
                <div class="card-body">
                    <div id="recomendaciones" class="pregresp">
                        <label class="text-primary" style="font-size:1.1rem;"><b>Recomendaciones:</b></label><br>
                        <label style='margin-left:2rem;'>
                            <p><b>-</b>  Asegurate de que la imagen y el audio sean lo más claros posibles.<br></p>
                            <p class="text-primary"><b>-</b>  Una vez presiones el boton de "Iniciar Cámara" tendrás la posibilidad de ver la cámara antes de iniciar la grabación por si necesitas prepararte.<br></p>
                            <p><b>-</b>  Tambien al debajo de la cámara podrás observar información de los temas que deberás abarcar en el video.<br></p>
                            <p class="text-primary"><b>-</b>  Ten en cuenta que deberás abarcar todos los puntos de la información solicitada para que tengas más oportunidad de conseguir empleo.<br></p>
                            <p><b>-</b>  En la ventana encontrarás un boton para iniciar la grabación y otro para cancelar por si quieres volver a iniciar.<br></p>
                            <p class="text-primary"><b>-</b>  Una vez hayas finalizado el video deberás presionar "Enviar Curriculum" para guardar el video y te mandará a una vista previa del mismo.<br></p>
                        </label><br>
                    </div>
                    <!-- Campos internos para la ubicacion -->
                    <input name="txtlatitud" id="latitud" type="hidden">
                    <input name="txtlongitud" id="longitud" type="hidden">
                    
                    <!-- Contenedor donde se muestra el video guardado para previsualizarlo -->
                    <div id="cuadrovideo" class="container" style="display:none">
                        <div class="row justify-content-center">
                            <h4 class="text-primary">Puedes verificar el video antes de enviarlo</h4>
                        </div>
                        <div class="row">
                                <video id="videoGuardado" class="w-100" controls></video> 
                            </div>
                        </div>
                        
                        <!-- Botones para cancelar y enviar video -->
                            <div id="btn-enviar" class="container text-center mt-4" style="display:none">
                                <input type="file" id="fileInput" hidden name="video">
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-danger w-100" onclick="recargarPagina()">Borrar Grabación</button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-primary w-100" onclick="guardarVideo()" >Enviar Video</button>
                                    </div>
                                </div>
                            </div>
    
    
                    <!-- Boton para abrir modal de video -->
                    <div id="btn-iniciarcamara" class="container text-center mt-4">
                        <button class="btn btn-primary w-50" id="btnIniciarCamara" data-toggle="modal" data-target="#modalCamara">Iniciar Cámara</button>
                    </div>
    
                    <!-- Modal -->
                    <div class="modal fade" id="modalCamara" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content border-0" style="border-radius:25px;">
                                <div class="modal-header text-center bg-primary" style="border-top-left-radius:25px;border-top-right-radius:25px;">
                                    <h2 class="modal-title text-white" id="exampleModalLabel">VIDEO INICIADO</h2>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <video id="videoElement" autoplay playsinline class="w-100"></video>
                                            <!-- Indicador visual de grabación -->
                                            <div id="indicadorGrabacion" class="rounded text-center text-white" style="background-color: red; font-weight:bold;">Grabación Desactivada</div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <div class="pregresp">
                                                <label class="text-primary" style="font-size:1.1rem;"><b>Temas a abordar:</b></label><br>
                                                <label style='margin-left:2rem;'>
                                                    <b>- Habla sobre tu experiencia laboral.</b><br>
                                                        <label style='margin-left:2rem;'>
                                                            <b>-</b> Puedes hablar sobre el puesto en el que te encontrabas, la empresa y el periodo.
                                                        </label><br>
                                                    <b>- Habla sobre tu formación academica.</b><br>
                                                        <label style='margin-left:2rem;'>
                                                            <b>-</b> Puedes hablar sobre la institución educativa que cursaste o estás cursando, su ubicación y el periodo.
                                                        </label><br>
                                                    <b>- Habla sobre tu aficiones.</b><br>
                                                        <label style='margin-left:2rem;'>
                                                            <b>-</b> Puedes describir todas las aficiones que tengas para conocerte mejor.
                                                        </label><br>
                                                    <b>- Habla sobre tu intereses.</b><br>
                                                        <label style='margin-left:2rem;'>
                                                            <b>-</b> Puedes describir todas los intereses que tengas para conocerte mejor.
                                                        </label>
                                                </label><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <button type="button" class="btn btn-info w-100 h-auto" id="btnIniciarGrabacion">Iniciar Grabación</button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-danger w-100 h-auto" id="btnCancelarGrabacion" disabled>Cancelar Grabación</button>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary w-100 h-auto text-white" id="btnGuardarCurriculum" data-dismiss="modal" disabled>Guardar Curriculum</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- {*Conexion de librerias de JavaScript y bootstrap*}      -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script>
        // Variables para almacenar el objeto de grabación de video y audio
        var mediaRecorderVideo;
        var mediaRecorderAudio;
        var blobVideo;
        // Variables para almacenar los fragmentos de video y audio grabados
        var recordedChunksVideo = [];
        var recordedChunksAudio = [];

        function recargarPagina() {
            // Recargar la página
            location.reload();
        }
        // Función para iniciar la cámara y mostrar el video en el modal
        document.getElementById('btnIniciarCamara').addEventListener('click', function () {
            // Obtener el elemento de video
            var video = document.getElementById('videoElement');

            // Obtener acceso a la cámara
            if (navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true, audio: true })
                    .then(function (stream) {
                        video.srcObject = stream;
                        // Crear el objeto MediaRecorder para grabar el video
                        mediaRecorderVideo = new MediaRecorder(stream);
                        // Manejar el evento de dataavailable para almacenar los fragmentos de video grabados
                        mediaRecorderVideo.ondataavailable = function (event) {
                            recordedChunksVideo.push(event.data);
                        };

                        // Crear el objeto MediaRecorder para grabar el audio
                        mediaRecorderAudio = new MediaRecorder(stream);
                        // Manejar el evento de dataavailable para almacenar los fragmentos de audio grabados
                        mediaRecorderAudio.ondataavailable = function (event) {
                            recordedChunksAudio.push(event.data);
                        };
                    })
                    .catch(function (error) {
                        console.log("Error al obtener acceso a la cámara: " + error);
                    });
            }
        });

        // Variable para indicar si la grabación está activa
        var grabacionActiva = false;

        // Función para iniciar la grabación de video y audio
        document.getElementById('btnIniciarGrabacion').addEventListener('click', function () {
            // Cambiar el indicador visual de grabación a verde cuando se inicia la grabación
            document.getElementById('indicadorGrabacion').style.backgroundColor = 'lime';
            document.getElementById('indicadorGrabacion').innerText = 'Grabación Activada';
            // Habilitar el botón "Guardar Curriculum"
            document.getElementById('btnGuardarCurriculum').disabled = false;
            document.getElementById('btnCancelarGrabacion').disabled = false;
            document.getElementById('btnIniciarGrabacion').disabled = true;

            grabacionActiva = true;
            // Iniciar la grabación de video
            mediaRecorderVideo.start();
            // Iniciar la grabación de audio
            mediaRecorderAudio.start();
        });

        // Función para cancelar la grabación de video y audio
        document.getElementById('btnCancelarGrabacion').addEventListener('click', function () {
            // Cambiar el indicador visual de grabación a rojo cuando se detiene la grabación
            document.getElementById('indicadorGrabacion').style.backgroundColor = 'red';
            document.getElementById('indicadorGrabacion').innerText = 'Grabación Desactivada';
            grabacionActiva = false;

            // Detener la grabación de video
            if (mediaRecorderVideo && mediaRecorderVideo.state !== 'inactive') {
                mediaRecorderVideo.stop();
            }

            // Detener la grabación de audio
            if (mediaRecorderAudio && mediaRecorderAudio.state !== 'inactive') {
                mediaRecorderAudio.stop();
            }

            // Limpiar los fragmentos grabados de video y audio
            recordedChunksVideo = [];
            recordedChunksAudio = [];

            // Deshabilitar el botón "Guardar Curriculum"
            document.getElementById('btnGuardarCurriculum').disabled = true;
            document.getElementById('btnCancelarGrabacion').disabled = true;
            document.getElementById('btnIniciarGrabacion').disabled = false;
        });

        // Función para detener la grabación de video y audio y guardar el curriculum
        document.getElementById('btnGuardarCurriculum').addEventListener('click', function () {
            // Cambiar el indicador visual de grabación a rojo cuando se detiene la grabación
            document.getElementById('indicadorGrabacion').style.backgroundColor = 'red';
            document.getElementById('indicadorGrabacion').innerText = 'Grabación Desactivada';
            setTimeout(() => {
                document.getElementById('btn-iniciarcamara').style.display = "none"
                document.getElementById('recomendaciones').style.display = "none"
                document.getElementById('cuadrovideo').style.display = "block"
                document.getElementById('btn-enviar').style.display = "block"
                document.getElementById('btnGuardarCurriculum').click();
            }, 200);
            grabacionActiva = false;
            // Detener la grabación de video
            if (mediaRecorderVideo && mediaRecorderVideo.state !== 'inactive') {
                mediaRecorderVideo.stop();
            }
            // Detener la grabación de audio
            if (mediaRecorderAudio && mediaRecorderAudio.state !== 'inactive') {
                mediaRecorderAudio.stop();
            }
            
            // Crear un objeto de URL para el video grabado
            blobVideo = new Blob(recordedChunksVideo, { type: 'video/mp4' });
            var videoUrl = URL.createObjectURL(blobVideo);

            // Crear un objeto de URL para el audio grabado
            var blobAudio = new Blob(recordedChunksAudio, { type: 'audio/wav' });
            var audioUrl = URL.createObjectURL(blobAudio);

            // Mostrar el video en la modal de visualización
            var videoVisualizar = document.getElementById('videoGuardado');
            videoVisualizar.src = videoUrl;

            // Mostrar el audio en la modal de visualización
            var audioVisualizar = document.getElementById('audioGuardado');
            audioVisualizar.src = audioUrl;


        });
        // Detener la cámara cuando se muestra la modal de visualizar video
        $('#modalVisualizarVideo').on('shown.bs.modal', function () {
            // Cerrar la modal de la cámara
            $('#modalCamara').modal('hide');
        });
        // Detener la cámara cuando se cierra el modal
        $('#modalCamara').on('hidden.bs.modal', function () {
            var video = document.getElementById('videoElement');
            var stream = video.srcObject;
            if (stream) {
                var tracks = stream.getTracks();
                tracks.forEach(function (track) {
                    track.stop();
                });
                video.srcObject = null;
            }
            // Detener la grabación de video si está activa
            if (grabacionActiva && mediaRecorderVideo && mediaRecorderVideo.state !== 'inactive') {
                mediaRecorderVideo.stop();
            }
            // Detener la grabación de audio si está activa
            if (grabacionActiva && mediaRecorderAudio && mediaRecorderAudio.state !== 'inactive') {
                mediaRecorderAudio.stop();
            }
            // Reiniciar el color del indicador de grabación a rojo
            document.getElementById('indicadorGrabacion').style.backgroundColor = 'red';
            // Limpiar los fragmentos grabados de video y audio
            recordedChunksVideo = [];
            recordedChunksAudio = [];
            // Deshabilitar el botón "Guardar Curriculum" si no hay grabación guardada
            document.getElementById('btnGuardarCurriculum').disabled = true;
            document.getElementById('btnCancelarGrabacion').disabled = true;
            document.getElementById('btnIniciarGrabacion').disabled = false;
        }); 
    </script>
    </body>

</html>