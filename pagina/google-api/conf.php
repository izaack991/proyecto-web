<?php
 require_once 'vendor/autoload.php';
 
// // configuracion inicial
// $clientID = '256112751198-j3belorgq0a04q5qeukcblp3n371r7q5.apps.googleusercontent.com';
// $clientSecret = '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';
// $redirectUri = 'http://localhost/proyecto-web/pagina/Usuario.php';
  
// // creacion de la solicitud Client para acceder a Google API 
// $client = new Google_Client();
// $client->setClientId($clientID);
// $client->setClientSecret($clientSecret);
// $client->setRedirectUri($redirectUri);
// $client->addScope("email");
// $client->addScope("profile");

// configuracion inicial
$clientID = '256112751198-j3belorgq0a04q5qeukcblp3n371r7q5.apps.googleusercontent.com';
$clientSecret = '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';

if ($_GET['xd'] == 1) {
    $redirectUri = 'http://workele.com/site/pagina/templates/regEmpresa.php?xd=1';
}
if ($_GET['xd'] == 2) {
    $redirectUri = 'http://workele.com/site/pagina/templates/regUsuario.php?xd=2';
}
if ($_GET['xd'] == 4) {
    $redirectUri = 'http://workele.com/site/pagina/templates/regEstudiante.php?xd=4';
}

// creacion de la solicitud Client para acceder a Google API 
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
