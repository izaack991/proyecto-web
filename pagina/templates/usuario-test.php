<?php
include('../php/Usuario-Test.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test para Usuario</title>
        <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
        <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
        <link id="theme-style" rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">

    <body style="background-color: #F8F6F3;">

        <!-- {*Barra de navegacion para Usuarios*} -->
        <?php include("navbar_usuario.php") ?>

        <!-- Lista de tests -->
        <br>
        <div>
            <div class="row align-items-center" style="margin-left:10px; margin-left:10px">
                <div class="col">
                    <figure class="text-center">
                        <input type="image" src="../../assets/images/LogoTest/Ravenimg.jpeg" height="183" width="376" />
                    </figure>
                    <center>
                        <?php
                        if ($comprobarRaven >= 1) {
                            // Usuario puede iniciar el test
                            echo '<a href="test_raven.php"><button class="btn btn-light" type="button">Iniciar test</button></a>';
                        } else {
                            // Usuario no puede iniciar el test
                            echo '<a href="#"><button class="btn btn-light disabled" type="button">No puedes iniciar este test</button></a>';
                        }
                        ?>
                    <center>
                </div>
                <div class="col">
                    <figure class="text-center">
                        <input type="image" src="../../assets/images/LogoTest/Cleaverimg.jpeg" height="183" width="376" />
                    </figure>
                    <center>
                        <?php
                        if ($comprobarCleaver >= 1) {
                            echo '<a href="test_cleaver.php"><button class="btn btn-light" type="button">Iniciar test</button></a>';
                        } else {
                            echo '<a href="#"><button class="btn btn-light disabled" type="button">No puedes iniciar este test</button></a>';
                        }
                        ?>
                    <center>
                </div>
            </div>
            <br><br>
            <div class="row align-items-center" style="margin-left:10px; margin-left:10px">
                <div class="col">
                    <figure class="text-center">
                        <input type="image" src="../../assets/images/LogoTest/Mossimg.jpeg" height="183" width="376" />
                    </figure>
                    <center>
                        <?php
                        if ($comprobarMoss >= 1) {
                            echo '<a href="test_moss.php"><button class="btn btn-light" type="button">Iniciar test</button></a>';
                        } else {
                            echo '<a href="#"><button class="btn btn-light disabled" type="button">No puedes iniciar este test</button></a>';
                        }
                        ?>
                    <center>
                </div>
                <div class="col">
                    <figure class="text-center">
                        <input type="image" src="../../assets/images/LogoTest/Merrilimg.jpeg" height="183" width="376" />
                    </figure>
                    <center>
                        <?php
                        if ($comprobarMerril >= 1) {
                            echo '<a href="test_merril.php"><button class="btn btn-light" type="button">Iniciar test</button></a>';
                        } else {
                            echo '<a href="#"><button class="btn btn-light disabled" type="button">No puedes iniciar este test</button></a>';
                        }
                        ?>
                    <center>
                </div>
            </div>
            <br><br>
            <div class="row align-items-center" style="margin-left:10px; margin-left:10px">
                <div class="col">
                    <figure class="text-center">
                        <input type="image" src="../../assets/images/LogoTest/SJTimg.jpeg" height="183" width="376" />
                    </figure>
                    <center>
                        <?php
                        if ($comprobarSjt >= 1) {
                            echo '<a href="test_sjt.php"><button class="btn btn-light" type="button">Iniciar test</button></a>';
                        } else {
                            echo '<a href="#"><button class="btn btn-light disabled" type="button">No puedes iniciar este test</button></a>';
                        }
                        ?>
                    <center>
                </div>
            </div>
            <br>
        </div>

        <!-- Conexion de librerias de JavaScript y bootstrap -->                
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.5/push.js"
            integrity="sha512-dzuBh7UxT5g4MmnbR3ybHMK2g2zxGXILXHuLsUwo8XJmoW2JTTqcg4bFFu0RnBO+kPTvKafgVYh8hnCN/l8ijQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.5/push.min.js"
            integrity="sha512-1zotA6QprPWXVvgx8KFnvanxTZhm7P/uadmELhEUs3fHYvGDqkYa0ZUc3Q0m+3w7AUcgG5k4rUiFDdSkRJhqaA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    </body>

</html>