<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de cuenta</title>
    <!-- Agregar Bootstrap CSS -->
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Estilo para controlar el alto de la imagen */
        .card-header {
            background-color: transparent;
            border: none; /* Eliminar borde del card-header */
        }
        .card-header img {
            height: 200px; /* Cambiar el valor según tus necesidades */
            object-fit: cover; /* Para ajustar la imagen dentro del espacio definido */
            width: 500px;
        }
    </style>
 
</head>
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <img src="../../assets/images/Workele.png" class="img-fluid" alt="" >
                    </div>
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Verificación de cuenta</h1>
                        <form id="formVerificacion">
                            <div class="form-group">
                                <label for="token">Ingrese el token de verificación:</label>
                                <input type="text" id="token" name="token" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="button" id="btnVerificar" class="btn btn-primary">Verificar</button>
                            </div>
                        </form>
                        <div id="resultadoVerificacion" class="mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Agregar Bootstrap JS y dependencias opcionales (jQuery y Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Script para manejar la verificación con AJAX -->
    <script>
        $(document).ready(function () {
            // Manejar clic en el botón de verificación
            $("#btnVerificar").click(function () {
                // Obtener el valor del token ingresado
                var token = $("#token").val();
                // Enviar la petición AJAX
                $.ajax({
                    url: "verificar.php",
                    type: "POST",
                    data: { token: token },
                    success: function (response) {
                        // Mostrar el resultado de la verificación
                        $("#resultadoVerificacion").html(response);
                    },
                    error: function () {
                        // Manejar errores de la petición AJAX
                        $("#resultadoVerificacion").html("Error al procesar la solicitud.");
                    }
                });
            });
        });
    </script>
</body>
</html>
