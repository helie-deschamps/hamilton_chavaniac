<?php

include_once __DIR__ . '/AuthSystem.php';

session_start();

$auth = AuthSystem::getInstance();
$user = null;

if (isset($_SESSION["connsessco"])) {
    $user = $auth->loginWithSession($_SESSION["connsessco"]);
}
else if (isset($_COOKIE["conncusr"])) {
    $user = $auth->loginWithCookie($_COOKIE["conncusr"]);
}