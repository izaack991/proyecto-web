<?php
error_reporting(0);
session_start();
include('../clases/function.class.php');

if($_SESSION['iusuario']) {
    echo 'todoBien';
} else {
    echo 'no_user';
}

?>