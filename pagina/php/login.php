<?php
// session_start(); // Iniciar sesión si aún no está iniciada

require_once '../clases/login.class.php';

// Definición de variables
$nuevoSingleton = Login::singleton_login();
$alerta = "";

if (isset($_POST['usuario'], $_POST['password'])) {
    $_usuario = $_POST['usuario'];
    $_password = $_POST['password'];
    
    // Obtener rol de sesión si existe
    $rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;

    // Verificar las credenciales del usuario
    $usuario = $nuevoSingleton->login_users($_usuario, $_password, $rol);
    
    if ($usuario) {
        // Verificar el estado del usuario
        $status = $nuevoSingleton->login_status($_usuario, $_password, $rol);

        if ($rol == 2 || $rol == 4) {
            header("Location: ../templates/indexPrincipal.php");
            exit();
        } elseif ($rol == 3) {
            header("Location: ../templates/indexAdmin.php");
            exit();
        } elseif ($rol == 1) {
            if ($status) {
                header("Location: ../templates/indexEmpresa.php");
                exit();
            } else {
                // Eliminar cualquier posible dato de sesión si el usuario no está verificado
                session_unset();
                session_destroy();

                // Usuario no verificado, mostrar SweetAlert
                ?>
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Usuario no verificado</title>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                </head>
                <body>
                    <script>
                        // Mostrar SweetAlert cuando el usuario no esté verificado
                        Swal.fire({
                            icon: 'info',
                            title: 'Usuario no verificado',
                            text: 'Esta cuenta está en proceso de verificación, por favor espere hasta que sea aprobada'
                        }).then((result) => {
                            window.location.href = '../templates/login.php?xd=1'; 
                        });
                    </script>
                </body>
                </html>
                <?php
                exit();
            }
        }
    } else {
        // Usuario no encontrado o credenciales incorrectas
        unset($_SESSION['rol']);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Usuario no existe</title>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        </head>
        <body>
            <script>
                // Variable que determina el valor de xd
                var xd_value = <?php echo ($rol == 3) ? 3 : (($rol == 2) ? 2 : (($rol == 1) ? 1 : 4)); ?>;

                // Mostrar SweetAlert cuando el usuario no esté verificado
                Swal.fire({
                    icon: 'error',
                    title: 'El usuario no existe',
                    text: 'Correo y/o contraseña incorrectos'
                }).then((result) => {
                    window.location.href = '../templates/login.php?xd=' + xd_value;
                });
            </script>
        </body>
        </html>
        <?php
        exit();
    }
} else {
    $loginrol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;
}

$Loginrol = isset($loginrol) ? $loginrol : '';
$Alerta = $alerta;
?>