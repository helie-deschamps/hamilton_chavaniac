<?php
include_once __DIR__ . '/private/authentication_systeme/try_auto_connection.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <title>SAMC - <?= $title ?></title>
    <meta name="Présentation SAMC" content="Découvrez la SAMC, une association dédiée à la culture et à l'histoire, impliquée dans la rénovation du Château Lafayette. Apprenez-en plus sur nos missions et participez à notre projet de financement, soutenu par les bénéfices du spectacle 'Hamilton'. Rejoignez-nous pour préserver un patrimoine historique exceptionnel.">

    <meta property="og:title" content="SAMC, l'organisateur de la première représentation d'Hamilton en France">
    <meta property="og:description" content="Découvrez la SAMC, une association dédiée à la culture et à l'histoire, impliquée dans la rénovation du Château Lafayette, où a eu lieu la première représentation de la comédie musicale 'Hamilton' en France.">
    <meta property="og:url" content="https://hamilton.helie.me/samc">
    <meta name="twitter:title" content="SAMC, l'organisateur de la première représentation d'Hamilton en France">
    <meta name="twitter:description" content="Découvrez la SAMC, une association dédiée à la culture et à l'histoire, impliquée dans la rénovation du Château Lafayette, où a eu lieu la première représentation de la comédie musicale 'Hamilton' en France.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="styles/style_samc.css">
    <?php include_once "master_dependencies_head.php" ?>
</head>

<body>
    <?php
include "header.php";
?>
    <div class="presentation">
        <h1>Présentation</h1>
       
        <p>La SAMC, Société des Amis du Musée Crozatier, rassemble passionnés et curieux de l'Art ancien, moderne et
            contemporain. Son objectif est de créer une connexion avec les admirateurs du musée, les invitant à rêver et
            à redécouvrir ses riches collections. Inspirée par Nietzsche, la SAMC célèbre la mémoire longue comme clé
            pour penser l'avenir, offrant ainsi une passerelle entre le passé et le présent.
        </p>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/activite1.webp" alt="activite samc">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/activite2.webp" alt="activite samc 2">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/activite3.webp" alt="activite samc 3">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <p>Les images utilisées proviennent du site de la SAMC.</p>
    </div>

    <div class="projet">
        <h1>Notre Projet</h1>
        <p>Notre projet consiste à mettre en scène la comédie musicale "Hamilton" en France, marquant ainsi une première
            française. Cette œuvre emblématique n'a jamais été jouée sur le sol français. Nous avons choisi
            l'association SAMC et préparons un événement exceptionnel en collaboration avec le château de Chavaniac, où
            est né le marquis de La Fayette, aujourd'hui transformé en musée et géré par la région Haute-Loire. Cet
            édifice historique, imprégné d'une riche histoire et culture, constitue le cadre idéal pour donner vie à la
            trame narrative captivante d'Hamilton, dont La Fayette est l'un des personnages principaux.</p>
           
    </div>
    <div class="logosamc"><img  src="img/logosamc.webp" alt="logosamc"></div>
    <div class="financement">
        <h1>Financement</h1>
        <p>Chaque place achetée pour assister à la pièce contribuera à hauteur de 75% à la restauration et à la
            préservation du château de La Fayette. Ce soutien financier contribuera à maintenir et à restaurer ce site
            historique, assurant ainsi sa pérennité pour les générations futures. Les 25% restants des finances
            serviront à assurer la pérennité de l'association SAMC.</p>
        <div class="imgfinance">
            <img src="img/financement1.webp" alt="Chateau La Fayette">
            <img src="img/financement2.webp" alt="Chateau La Fayette">
            <img src="img/financement3.webp" alt="Chateau La Fayette">
        </div>
    </div>



    <footer><?php include_once"footer.php" ?>
    </footer>
</body>


</html>