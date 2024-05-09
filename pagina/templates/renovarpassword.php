<?php
session_start();

$user_id=$_GET['xsw'];

$_SESSION['pwid']=$user_id;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Contraseña</title>
    <!-- Bootstrap CSS -->
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
  <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
  <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
  <link id="theme-style" rel="stylesheet" href="../../assets/css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Estilo para controlar el alto de la imagen */
        .card-header {
            background-color: transparent;
            border: none;
            /* Eliminar borde del card-header */
        }

        .card-header img {
            height: 200px;
            /* Cambiar el valor según tus necesidades */
            object-fit: cover;
            /* Para ajustar la imagen dentro del espacio definido */
            width: 600px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-mb-6">
                <div class="card" style="max-width: 50rem; margin:auto; margin-top:30px; border-radius:25px;">
                    <div class="card-header">
                        <img src="../../assets/images/Workele.png" class="img-fluid" alt="">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title text-center mb-6">Cambio de contraseña</h1>
                        <form id="frmRenovarpassword" method="POST"> 
                            <div class="form-row mb-3" id="password_div">
                                <div class="form-group col-md-6">
                                    <div class="form-floating" style="height: 4rem;">
                                        <input oninput="verificarContrasenas()" onfocus="display_passwordrules()"
                                            pattern="(?=.*\d)(?=.*[A-Z]).{8,}" class="form-control validate password"
                                            type="password" name="txt_PASSWORD" class="texto" minlength="8"
                                            id="txt_PASSWORD" maxLength="30" placeholder="Escriba la Contraseña"
                                            required="true"><br>
                                        <label class="d-inline">Contraseña *</label><br>
                                    </div>
                                    <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-floating" style="height: 4rem;">
                                        <input oninput="verificarContrasenas()" onfocus="display_passwordrules()"
                                            class="form-control" type="password" name="txt_PASSWORD2"
                                            class="texto validate passwordConfirm" minlength="8" id="txt_PASSWORD2"
                                            maxLength="30" placeholder="Confirme la Contraseña" required="true"><br>
                                        <label>Confirme Contraseña *</label><br>
                                    </div>
                                </div>
                            </div>
                            <div id="password_rules" style="display: none;">
                                <label>Las contraseñas deben cumplir estos requisitos:</label>
                                <ul>
                                    <li class="password_length incomplete">Contener al menos 8 carácteres</li>
                                    <li class="password_uppercase incomplete">Al menos 1 letra mayuscula</li>
                                    <li class="password_number incomplete">Al menos 1 numero</li>
                                    <li class="password_match incomplete">Las contraseñas deben coincidir</li>
                                </ul>
                            </div>
                            <div class="container text-center mt-4">
                                 <input class="btn btn-primary w-50" type="submit" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>

  <script src="../js/password.js"></script>
  <script src="../js/registro.js"></script>
  <script src="../js/insert.js"></script>
</body>

</html>
