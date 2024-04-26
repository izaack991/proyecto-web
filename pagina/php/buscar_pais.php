<?php 
include('../clases/save.class.php');
include('../clases/function.class.php');


    $_findPais = Functions::singleton_functions();
    $_paisnombre = $_findPais->buscaPaises();

    echo json_encode($_paisnombre);

?>
