<?php
// Récupération du code de l'erreur
    if(!isset($error)) {
        if(isset($_GET["error"])) {
            $error = $_GET["error"];
        }
        else {
            $error = "404";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once "master_dependencies_head.php" ?>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('img/page-404.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            
        }
        @font-face {
            font-family: 'HOMINIS';
            src: url('fonts/HOMINIS.woff') format('woff');
        }

        .titre-erreur {
            font-family: 'HOMINIS', serif;
            color: white;
            font-size: 7em;
            margin: 0.5em 1.25em;
            position: relative;
        }

    @media screen and (min-width: 1024px) {
        body {
    background-image: url('img/page-404.webp');
        }
    }

    @media screen and (max-width: 1023px) {
        body {
    background-image: url('img/page-404_mobile.png');
        }

        .titre-erreur {
            margin:0.5em;
            text-align: center;
        }
    }


    </style>
    <title>La Fayette est perdu ! - Hamilton en France</title>
</head>
<?php
include 'header.php'
?>
<body>
    <div class="Page-erreur">
        <h1 class="titre-erreur"><?= $error ?></h1>
</body>
</html>
