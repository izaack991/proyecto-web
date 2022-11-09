<?php
/* Smarty version 4.1.0, created on 2022-11-09 07:00:37
  from 'C:\xampp\htdocs\proyecto-web\smarty\templates\Buscar_vacantes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_636b4205a65557_13398856',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02d897f3e90e125ed37c065de7be276f1898c37a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto-web\\smarty\\templates\\Buscar_vacantes.tpl',
      1 => 1667973620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636b4205a65557_13398856 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">  
    </head>
<body>
<?php echo '<script'; ?>
 src="../smarty/js/ubicacion.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"><?php echo '</script'; ?>
>
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
        <a class="nav-link active text-danger " href="login.php" style="font-weight:bold;">Cerrar Sesión</a>
      </ul>
    </div>
  </div>
</nav>

<div class="alert alert-dismissible">
  <div>
    <center>
      <input type="text" class="btn btn-light disabled" placeholder="Busque una vacante" style="display:inline; width:510px;" name="bvac">

      <select class="btn btn-light disabled" id="exampleSelect1" name="cmbpais">
            <option value="">Elige una opción</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Paises']->value, 'pais');
$_smarty_tpl->tpl_vars['pais']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pais']->value) {
$_smarty_tpl->tpl_vars['pais']->do_else = false;
?> 
              <option value=<?php echo $_smarty_tpl->tpl_vars['pais']->value['id_paises'];?>
><?php echo $_smarty_tpl->tpl_vars['pais']->value['nombre'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </select>

        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>

        </center>
    </div>
</div>


    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Vacantes']->value, 'vacantes');
$_smarty_tpl->tpl_vars['vacantes']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['vacantes']->value) {
$_smarty_tpl->tpl_vars['vacantes']->do_else = false;
?>
      <div class="card border-primary shadow p-3 mb-5 bg-body rounded" style="max-width: 40rem; margin:auto; margin-top:30px;">
          <div class="card-body">
            <h4 class="card-title" style="display:inline;"><?php echo $_smarty_tpl->tpl_vars['vacantes']->value['puesto'];?>
</h4> <br><br>
            <h4 class="card-title text-primary">$<?php echo $_smarty_tpl->tpl_vars['vacantes']->value['sueldo'];?>
</h4>
              <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['vacantes']->value['datos_adicionales'];?>
</p>
          </div>
      </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      
</body>
</html><?php }
}
