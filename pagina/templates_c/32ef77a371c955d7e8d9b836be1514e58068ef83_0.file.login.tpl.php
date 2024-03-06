<?php
<<<<<<< HEAD
/* Smarty version 4.3.2, created on 2024-03-06 00:47:37
=======
/* Smarty version 4.3.2, created on 2024-03-05 00:53:23
>>>>>>> 50e830099dece0330bed4e97014a767ee455603c
  from 'C:\xampp\htdocs\proyecto-web\smarty\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
<<<<<<< HEAD
  'unifunc' => 'content_65e7af198ac210_83861063',
=======
  'unifunc' => 'content_65e65ef343d7b4_03437482',
>>>>>>> 50e830099dece0330bed4e97014a767ee455603c
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32ef77a371c955d7e8d9b836be1514e58068ef83' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto-web\\smarty\\templates\\login.tpl',
<<<<<<< HEAD
      1 => 1709682454,
=======
      1 => 1709588988,
>>>>>>> 50e830099dece0330bed4e97014a767ee455603c
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
<<<<<<< HEAD
function content_65e7af198ac210_83861063 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_65e65ef343d7b4_03437482 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> 50e830099dece0330bed4e97014a767ee455603c
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

                <form action="" method="post">

                        <?php echo $_smarty_tpl->tpl_vars['alerta']->value;?>


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
                                                        <A HREF="../../proyecto-web/pagina/Usuario.php" class="btn btn-light" type="submit"  style="padding-bottom: 10mm;">Registrarse</A>
                        </center>
                    </div>
                </div>

                                <a href="index.php"><button class="btn btn-light" type="button">VOLVER</button></a>

            </div>

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
