<?php

include_once 'AuthSystem.php';

$auth = AuthSystem::getInstance();
$user = null;

if(isset($_COOKIE["conncusr"])) {
    $user = $auth->loginWithCookie($_COOKIE["conncusr"]);
}