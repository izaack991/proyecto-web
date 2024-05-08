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
    <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
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
    <form id="formVerificacion" method="POST">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <img src="../../assets/images/Workele.png" class="img-fluid" alt="" >
                    </div>
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Verificación de cuenta</h1>
                       
                            <div class="form-group">
                                <label for="token">Ingrese el token de verificación:</label>
                                <input type="text" id="token" name="token" class="form-control" required>
                            </div>
                            <div class="text-center">
                             <input class="btn btn-primary w-50" type="submit" value="Guardar">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="../js/insert.js"></script>

</body>
</html>
