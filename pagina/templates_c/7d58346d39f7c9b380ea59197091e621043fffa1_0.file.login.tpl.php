<?php
/* Smarty version 4.2.1, created on 2022-11-04 18:34:18
  from '/Applications/XAMPP/xamppfiles/htdocs/proyecto-web/smarty/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63654d1ae88901_13143763',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d58346d39f7c9b380ea59197091e621043fffa1' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/proyecto-web/smarty/templates/login.tpl',
      1 => 1667583208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63654d1ae88901_13143763 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">  
    </head>
<body>
    <form action="../pagina/login.php" method="post">
    <br><div style="margin-top: 167px; margin-left: 35%; "> 
    <div class="card border-secondary mb-3" style="max-width: 25rem;">
    <FONT COLOR="black"><div class="card-header bg-primary" align="center">Inicio de sesion</div></FONT>
  <div class="card-body">
        <br><br>
        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingresa tu correo electronico">
        <br><br>
        <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa contraseña">
        <br><br>
       <center> <button class="btn btn-light" type="submit">Iniciar sesion</button>
       <A HREF="../../proyecto-web/pagina/Usuario.php"class="btn btn-light" type="submit">Registrarse</A></center>
        </div>
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

</html>
</body>
</html><?php }
}
