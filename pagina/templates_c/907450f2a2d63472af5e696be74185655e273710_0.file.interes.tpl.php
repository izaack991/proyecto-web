<?php
/* Smarty version 4.1.0, created on 2022-10-14 02:49:50
  from '/Applications/XAMPP/xamppfiles/htdocs/proyecto-web/smarty/templates/interes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6348b22e015e55_04119036',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '907450f2a2d63472af5e696be74185655e273710' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/proyecto-web/smarty/templates/interes.tpl',
      1 => 1665708587,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6348b22e015e55_04119036 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>
<body style="background-color:#024A86">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Inicio</a>
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
