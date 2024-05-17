<?php
session_start();

include("../clases/save.class.php");
include("../clases/function.class.php");

$buscar = Functions::singleton_functions();
$guardar = Save::singleton_guardar();
$id_empresa = $_SESSION['iusuario'];
$id_usuario = $_POST["id_usuario"];
$id_conversacion = $buscar->seleccionar_conversacion($id_empresa,$id_usuario);

if ($id_conversacion == null )
    {
        $guardar->insertar_conversacion($id_empresa,$id_usuario);
        $id_conversacion = $buscar->seleccionar_conversacion($id_empresa,$id_usuario);
        $id_usuario = $_SESSION['iusuario'];
        $mensaje = "Hola, estamos interesados en tu Curriculum.";
        $guardar->insertar_mensaje($id_conversacion ,$mensaje, $id_usuario);
        echo ("logrado");
    }
    else
    { 
        echo ("no logrado");
    }
?>