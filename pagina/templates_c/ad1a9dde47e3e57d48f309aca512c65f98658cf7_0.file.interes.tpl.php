<?php
/* Smarty version 4.1.0, created on 2022-10-21 16:31:18
  from 'C:\xampp\htdocs\proyecto-web\smarty\templates\interes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6352ad36e2c3e4_74882506',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad1a9dde47e3e57d48f309aca512c65f98658cf7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto-web\\smarty\\templates\\interes.tpl',
      1 => 1666358458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6352ad36e2c3e4_74882506 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
<!-- CSS only -->
<link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
<link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">  
<body style="background-color:#024A86">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container-fluid">
  <a class="navbar-brand" href="index.php">Inicio</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link active" href="experiencia_laboral.php">Experiencia Laboral
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link active" href="formacion_academica.php">Formacion Academica
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link active" href="Aficiones.php">Aficiones
        </a>
      </li> 
      <li class="nav-item">
      <a class="nav-link active" href="interes.php">Interes
      </a>
    </li> 
      <li class="nav-link active"><?php echo $_SESSION['nomusuario'];?>
</li>
      <a class="nav-link active text-info" href="login.php">Cerrar Sesión</a>
    </ul>
  </div>
</div>
</nav>
<form action="interes.php" method="POST">
  <div style="margin-top: 2%; margin-left: 37%;">
    <div class="card border-primary mb-3" style="max-width: 20rem;">
      <div class="card-body">
      <h4 class="card-title">Datos de Interes</h4>
        <p class="card-text">
          <label>Descripcion*:</label><br>
          <input class="textbox" type="text" name="txtdesc" placeholder="Escriba una descripcion" required="true"><br><br>
          <button type="submit" name="guardar" class="btn btn-outline-dark">Guardar</button>
        </p>
      </div>
    </div>
  </div>
</form>
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
