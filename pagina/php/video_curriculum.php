<?php
$f_id_usuario = 123;
$_ruta = $_FILES['video'];
//Obtenemos algunos datos necesarios sobre el archivo de la imagen
$imgTipo = $_FILES['video']['type'];
$arrayImgExt = explode('/', $imgTipo);
$imgExt = $arrayImgExt[1];
$imgName = 'pfp_'.$f_id_usuario.'.'.$imgExt;
$tamano = $_FILES['video']['size'];
$temp = $_FILES['video']['tmp_name'];

echo $imgTipo;

