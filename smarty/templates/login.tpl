<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
        <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    </head>

    <body>

        {*Formuario de Login*}
        <form action="" method="post">

            {*Mensaje para los errores al ingresar*}
            {$alerta}

            <div style="margin-top: 150px; margin-left: 35%; ">
                {*Card del login*}
                <div class="card border-secondary mb-3" style="max-width: 25rem;">
                    <FONT COLOR="black"><div class="card-header bg-primary" style="font-weight: bold;" align="center">Inicio de sesion</div></FONT>
                    <div class="card-body">

                        {*Campos para los datos del login*}
                        <br>
                        <label for="name" class="form__label" style="font-weight: bold;">Correo electronico</label> <br>
                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingresa tu correo electronico">
                        <br>
                        <label for="name" class="form__label fw-bold" style="font-weight: bold;">Contraseña</label> <br>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa contraseña">
                        <br><br>

                        <center>
                            {*Boton para iniciar sesion*} 
                            <button class="btn btn-light" type="submit" style="padding-bottom: 10mm;">Iniciar sesion</button>
                            {*Boton para registrarse*}
                            <A HREF="../../proyecto-web/pagina/Usuario.php" class="btn btn-light" type="submit"  style="padding-bottom: 10mm;">Registrarse</A>
                        </center>
                    </div>
                </div>

                {*Boton para volver al indexPrincipal*}
                <a href="index.php"><button class="btn btn-light" type="button">VOLVER</button></a>

            </div>

        {*Conexion de librerias de JavaScript y bootstrap*}
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>

</html>