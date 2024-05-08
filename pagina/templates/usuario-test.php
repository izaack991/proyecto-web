<?php include('../php/Usuario-Test.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test para Usuario</title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
    <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
    <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body style="background-color: #F8F6F3;">

    <!-- {*Barra de navegacion para Usuarios*} -->
    <?php include("navbar_usuario.php") ?>

    <div class="container-fluid">
        <!-- Lista de tests -->
        <div class="row align-items-center">
            <!-- Test Raven -->
            <div class="col-xs-12 col-sm-6 col-md-4 text-center" style="padding-top:5%">
                <figure class="mb-4">
                    <img src="../../assets/images/LogoTest/Ravenimg.jpeg" class="img-fluid" alt="Test Raven" />
                </figure>
                <?php if ($comprobarRaven >= 1) {
                    // Usuario puede iniciar el test
                    echo '<a href="test_raven.php" class="btn btn-light">Iniciar test</a>';
                } else { 
                    // Usuario no puede iniciar el test
                    echo '<button class="btn btn-light" type="button" disabled>No puedes iniciar este test</button>';
                } 
                ?>
            </div>

            <!-- Test Cleaver -->
            <div class="col-xs-12 col-sm-6 col-md-4 text-center" style="padding-top:5%">
                <figure class="mb-4">
                    <img src="../../assets/images/LogoTest/Cleaverimg.png" class="img-fluid" alt="Test Cleaver" />
                </figure>
                <?php if ($comprobarCleaver >= 1) {
                    // Usuario puede iniciar el test
                    echo '<a href="test_cleaver.php"><button class="btn btn-light" type="button">Iniciar test</button></a>';
                } else { 
                    // Usuario no puede iniciar el test
                    echo '<button class="btn btn-light" type="button" disabled>No puedes iniciar este test</button>';
                } 
                ?>
            </div>

            <!-- Test Moss -->
            <div class="col-xs-12 col-sm-6 col-md-4 text-center" style="padding-top:5%">
                <figure class="mb-4">
                    <img src="../../assets/images/LogoTest/Mossimg.jpeg" class="img-fluid" alt="Test Moss" />
                </figure>
                <?php if ($comprobarMoss >= 1) {
                    // Usuario puede iniciar el test
                    echo '<a href="test_moss.php"><button class="btn btn-light" type="button">Iniciar test</button></a>';
                } else { 
                    // Usuario no puede iniciar el test
                    echo '<button class="btn btn-light" type="button" disabled>No puedes iniciar este test</button>';
                } 
                ?>
            </div>

            <!-- Test Merril -->
            <div class="col-xs-12 col-sm-6 col-md-4 text-center" style="padding-top:5%">
                <figure class="mb-4">
                    <img src="../../assets/images/LogoTest/Merrilimg.jpeg" class="img-fluid" alt="Test Merril" />
                </figure>
                <?php if ($comprobarMerril >= 1) {
                    // Usuario puede iniciar el test
                    echo '<a href="test_merril.php"><button class="btn btn-light" type="button">Iniciar test</button></a>';
                } else { 
                    // Usuario no puede iniciar el test
                    echo '<button class="btn btn-light" type="button" disabled>No puedes iniciar este test</button>';
                } 
                ?>
            </div>

            <!-- Test SJT -->
            <div class="col-xs-12 col-sm-6 col-md-4 text-center" style="padding-top:5%">
                <figure class="mb-4">
                    <img src="../../assets/images/LogoTest/SJTimg.jpeg" class="img-fluid" alt="Test SJT" />
                </figure>
                <?php if ($comprobarSjt >= 1) {
                    // Usuario puede iniciar el test
                    echo '<a href="test_sjt.php"><button class="btn btn-light" type="button">Iniciar test</button></a>';
                } else { 
                    // Usuario no puede iniciar el test
                    echo '<button class="btn btn-light" type="button" disabled>No puedes iniciar este test</button>';
                } 
                ?>
            </div>
        </div>
    </div>


    <!-- Conexion de librerias de JavaScript y bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>