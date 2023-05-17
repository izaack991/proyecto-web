<?php
<<<<<<< HEAD
/* Smarty version 4.1.0, created on 2023-05-17 19:48:54
=======
/* Smarty version 4.1.0, created on 2023-05-17 19:32:46
>>>>>>> 320084b0715d9f49d6c7bf4abbb79e3bd7af8948
  from 'C:\xampp\htdocs\proyecto-web\smarty\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
<<<<<<< HEAD
  'unifunc' => 'content_64651386148722_06280680',
=======
  'unifunc' => 'content_64650fbe78cc58_97623323',
>>>>>>> 320084b0715d9f49d6c7bf4abbb79e3bd7af8948
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32ef77a371c955d7e8d9b836be1514e58068ef83' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto-web\\smarty\\templates\\login.tpl',
<<<<<<< HEAD
      1 => 1684344772,
=======
      1 => 1684344724,
>>>>>>> 320084b0715d9f49d6c7bf4abbb79e3bd7af8948
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
<<<<<<< HEAD
function content_64651386148722_06280680 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_64650fbe78cc58_97623323 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> 320084b0715d9f49d6c7bf4abbb79e3bd7af8948
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


            <div style="margin-top: 167px; margin-left: 35%; ">
                                <div class="card border-secondary mb-3" style="max-width: 25rem;">
                    <FONT COLOR="black"><div class="card-header bg-primary" align="center">Inicio de sesion</div></FONT>
                    <div class="card-body">

                                                <br><br>
                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingresa tu correo electronico">
                        <br><br>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa contraseña">
                        <br><br>

                        <center>
                             
                            <button class="btn btn-light" type="submit">Iniciar sesion</button>
                                                        <A HREF="../../proyecto-web/pagina/Usuario.php" class="btn btn-light" type="submit">Registrarse</A>
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
