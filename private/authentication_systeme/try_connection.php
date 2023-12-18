<?php

include_once __DIR__ . '/AuthSystem.php';

session_start();

$auth = AuthSystem::getInstance();
$user = null;

// si création de compte
if(isset($_POST["username"]) && isset($_POST["icon_id"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    if(!$auth->verifMail($_POST["email"])){
        die("Email invalide");
    }
    if (!$auth->verifUsername($_POST["username"])){
        die("Username invalide");
    }
    $pwtest = $auth->verifPassword($_POST["password"]);
    if (!($pwtest == true)){
        die($pwtest);
    }

    if($auth->createUser($_POST["email"], $_POST["username"], $_POST["password"], (int)$_POST["icon_id"])){
        $user = $auth->loginWithEmailPassword($_POST["email"], $_POST["password"], isset($_POST["cookieAccepted"]));
    }
    else {
        die("Email déjà utilisé");
    }
}
// si cnnection par mot de pass
else if(isset($_POST["email"]) && isset($_POST["password"])) {
    $user = $auth->loginWithEmailPassword($_POST["email"], $_POST["password"], isset($_POST["cookieAccepted"]));
    if(!$user){
        die("Email ou mot de passe incorrect");
    }
}