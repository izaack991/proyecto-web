<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'redirect.php';
 
// // configuracion inicial
// $clientID = '256112751198-j3belorgq0a04q5qeukcblp3n371r7q5.apps.googleusercontent.com';
// $clientSecret = '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';

// if ($_GET['xd'] == 1) {
//     $redirectUri = 'http://localhost/proyecto-web/pagina/templates/usuario.php?xd=1';
// }
// if ($_GET['xd'] == 2) {
//     $redirectUri = 'http://localhost/proyecto-web/pagina/templates/usuario.php?xd=2';
// }

// // creacion de la solicitud Client para acceder a Google API 
// $client = new Google_Client();
// $client->setClientId($clientID);
// $client->setClientSecret($clientSecret);
// $client->setRedirectUri($redirectUri);
// $client->addScope("email");
// $client->addScope("profile");

// autenticación de Google OAuth Flow 
// if (isset($_GET['code'])) {
//     $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
//     $client->setAccessToken($token['access_token']);
    
//     // obtencion de la informacion del perfil
//     $google_oauth = new Google_Service_Oauth2($client);
//     $google_account_info = $google_oauth->userinfo->get();
//     $email =  $google_account_info->email;
//     $name =  $google_account_info->name;
   
//     $_SESSION['email'] = $email;
//     $_SESSION['nombre'] = $name;
//   } else {
//     $link = $client->createAuthUrl();
//     header("Location: $link");
//   }

$link = $client->createAuthUrl();
header("Location: $link");

//echo "$link";