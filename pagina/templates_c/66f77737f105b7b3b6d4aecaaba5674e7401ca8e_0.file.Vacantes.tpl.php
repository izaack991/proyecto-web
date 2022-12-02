<?php
/* Smarty version 4.2.0, created on 2022-12-02 18:46:34
  from 'C:\xampp\htdocs\proyecto-web\smarty\templates\Vacantes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_638a39fa34a8e1_40058152',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66f77737f105b7b3b6d4aecaaba5674e7401ca8e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto-web\\smarty\\templates\\Vacantes.tpl',
      1 => 1670001974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638a39fa34a8e1_40058152 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
	<link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">  
</head>
<body>
<?php echo '<script'; ?>
 src="../smarty/js/ubicacion.js"><?php echo '</script'; ?>
>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="indexEmpresa.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="Vacantes.php">Vacantes
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="postulacion.php">Postulaciones
          </a>
        </li> 
        <li class="nav-link active"><?php echo $_SESSION['nomusuario'];?>
</li>
        <a class="nav-link active text-danger" href="indexPrincipal.php" style="font-weight:bold;">Cerrar Sesión</a>
      </ul>
    </div>
  </div>
</nav>
<form action="Vacantes.php" method="POST">
        
    <div class="card  mb-3" style="max-width: 20rem; margin:auto; margin-top:30px;">
      <div class="card-body">
        <h4 class="card-title">Datos de Vacantes</h4>
        <label>Los campos marcados con asterisco son obligatorios</label> <br>


        <label for="name" class="form__label"> Puesto *</label> <br>
        <input class="form-control" type="text" name="txtpuesto" placeholder="Ingresa el Puesto"> <br>

       
        <label for="name" class="form__label"> Sueldo *</label><br>
        <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input class="form-control " type="text" name="txtsueldo" placeholder="Ingresa el Sueldo"> <br>
        </div>

        <label for="name" class="form__label"> Lugar*</label> <br>
        <div class="form-row" text-align: center;>
        <div class="col">
        <select class="form-select" id="exampleSelect1" name="cmbpais">
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
         </select></div></div><br>

        <label for="name" class="form__label"> Datos Adicionales *</label> <br>
        <input class="form-control" type="text" name="txtdatos" placeholder="Ingresa los Datos"> <br>

        <input name ="txtlatitud" id="latitud"type="hidden">
				<input name="txtlongitud" id="longitud" type="hidden">

        <input class="btn btn-primary" style="margin-left:90px;" type="submit"  value="Guardar">
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
</html><?php }
}
