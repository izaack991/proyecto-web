<?php
/* Smarty version 4.3.2, created on 2024-03-10 02:15:17
  from 'C:\xampp\htdocs\proyecto-web\smarty\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65ed09a5359b06_76713927',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32ef77a371c955d7e8d9b836be1514e58068ef83' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto-web\\smarty\\templates\\login.tpl',
      1 => 1709855641,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ed09a5359b06_76713927 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
        <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
        <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"><?php echo '</script'; ?>
>

    </head>

    <body>

                <form id="LogIn" action="" method="post">

            
            <div style="margin-top: 150px; margin-left: 35%; ">
                                <div class="card border-secondary mb-3" style="max-width: 25rem;">
                    <FONT COLOR="black"><div class="card-header bg-primary" style="font-weight: bold;" align="center">Inicio de sesion</div></FONT>
                    <div class="card-body">

                                                <br>
                        <label for="name" class="form__label" style="font-weight: bold;">Correo electronico</label> <br>
                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingresa tu correo electronico">
                        <br>
                        <label for="name" class="form__label fw-bold" style="font-weight: bold;">Contraseña</label> <br>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa contraseña">
                        <br><br>

                        <center>
                             
                            <button class="btn btn-light" type="submit" style="padding-bottom: 10mm;">Iniciar sesion</button>
                                                        <A HREF="../../proyecto-web/pagina/Usuario.php" class="btn btn-light" type="submit" style="padding-bottom: 10mm;">Registrarse</A>
                        </center>
                    </div>
                </div>

                                <a href="index.php"><button class="btn btn-light" type="button">VOLVER</button></a>

            </div>


        <?php echo '<script'; ?>
>
            document.getElementById('LogIn').addEventListener('submit', function(event)
            {
                // Evitar el envío automático del formulario
                event.preventDefault();
                
                // Obtener los datos del formulario
                var formData = new FormData(this);

                // Enviar los datos mediante AJAX
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'login.php', true);
                xhr.onload = function()
                {
                    if (xhr.status >= 200 && xhr.status < 400) 
                    {
                        // Éxito en la solicitud
                        // Aquí puedes manejar la respuesta del servidor, si es necesario
                        console.log(xhr.responseText);
                    } 
                    else 
                    {
                        // Error en la solicitud
                        console.error('Error en la solicitud');
                    }
                };
                
                xhr.onerror = function() 
                {
                    // Error en la conexión
                    console.error('Error en la conexión');
                };
                xhr.send(formData);
            });
        <?php echo '</script'; ?>
>
                <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"><?php echo '</script'; ?>
>

    </body>

</html><?php }
}
