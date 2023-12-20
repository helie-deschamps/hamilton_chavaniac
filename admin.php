<?php

require_once __DIR__ . '/private/db_gestion/DB.php';

if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
    if((strcmp($_SERVER['PHP_AUTH_USER'], "authUwU") == 0) && (strcmp($_SERVER['PHP_AUTH_PW'], "auth") == 0)) {
        header('WWW-Authenticate: Basic realm="admin"');
        header('HTTP/1.0 200 Unauthorized');
    }
    else {
        header('WWW-Authenticate: Basic realm="admin"');
        header('HTTP/1.0 403 Unauthorized');
        $error = "403";
        include  __DIR__ . '/page404.php';
        exit;
    }
}
else{
    header('WWW-Authenticate: Basic realm="admin"');
    header('HTTP/1.0 401 Unauthorized');
    $error = "401";
    include __DIR__ . '/page404.php';
    exit;
}

if(isset($_GET["request"])) {
    if(strcmp($_GET["request"], "userbymail") == 0) {
        die(json_encode(DB::getInstance()->findUserIDByMail(file_get_contents('php://input'))));
    }
}
?>
<doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascripts/admin.js" defer></script>
</head>
<body>
    <h1>Rechercher un utilisateur</h1>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <div id="result-user"></div>

</body>
</html>