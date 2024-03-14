<?php
// Obtener las contraseñas del cuerpo de la solicitud
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// Verificar si las contraseñas coinciden
if ($password === $confirmPassword) {
  echo "coinciden";
} else {
  echo "no_coinciden";
}
?>