<?php
/* Smarty version 4.1.0, created on 2022-10-19 19:58:40
  from '/Applications/XAMPP/xamppfiles/htdocs/proyecto-web/smarty/templates/formacion_academica.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63503ad0a76393_89158056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83f4c60c249a10199a44ba8926769ef8816bc362' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/proyecto-web/smarty/templates/formacion_academica.tpl',
      1 => 1666202300,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63503ad0a76393_89158056 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">  
    <link  rel="stylesheet" href="estilos.css" type="text/css"> 
</head>
<body>
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
    <form action="formacion_academica.php" method="POST">
        <div> 
            <label>Datos personales</label>
            <br>
            <label>Los campos marcados con asterisco son obligatorios</label>
            <br>
            <label>descripcion *:</label><br>
            <input type="text" name="descripcion" class="texto" placeholder="descripcion" required="true"><br>
            <label>ubicacion *</label><br>
            <input type="text" name="ubicacion" class="texto" placeholder="ubicacion" required="true"><br>
            <label>periodo *</label><br>
            <input type="text" name="periodo" class="texto" placeholder="periodo" required="true"><br>
            <button type="submit">Guardar</button>
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
