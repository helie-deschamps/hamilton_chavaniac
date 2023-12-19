<?php
//include_once __DIR__ . '/private/authentication_systeme/try_auto_connection.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="styles/style_samc.css">
    <link rel="stylesheet" href="styles/fonts.css">

</head>

<body>
    <?php
include "header.php";
?>
    <div class="presentation">
        <h1>Présentation</h1>
        <p>La SAMC, Société des Amis du Musée Crozatier, réunit passionnés et curieux de l'Art ancien, moderne et
            contemporain. Son but est de créer une connexion avec les admirateurs du musée, les invitant à rêver et à
            redécouvrir ses riches collections. Inspirée par Nietzsche, la SAMC célèbre la mémoire longue comme clé pour
            penser l'avenir, offrant ainsi une passerelle entre le passé et le présent.
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
                    <img src="img/activitesamc.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/activite2samc.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/activite3samc.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/activite4samc.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
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
    </div>

    <div class="projet">
        <h1>Notre Projet</h1>
        <p>Notre projet consiste à mettre en scène la comédie musicale "Hamilton" en France, marquant ainsi une
            première française. Cette œuvre emblématique n'a jamais été jouée sur le sol français. Nous avons choisi
            l'association SAMC, et nous préparons un événement exceptionnel en collaboration avec le château de
            Chavaniac, où est né le marquis de La Fayette, aujourd'hui transformé en musée et géré par la région
            Haute-Loire. Cet édifice historique, imprégné d'une riche histoire et culture, constitue le cadre idéal
            pour donner vie à la trame narrative captivante d'Hamilton, dont La Fayette est l'un des personnages
            principaux.</p>
    </div>
    <div class="financement">
        <h1>Financement</h1>
        <p>Chaque place achetée pour assister à la pièce contribuera à hauteur de 75% à la restauration et à la
            préservation du château de La Fayette. Ce soutien financier contribuera à maintenir et à Frestaurer ce
            site historique, assurant ainsi sa pérennité pour les générations futures. Les 25% des finances
            restantes serviront à assurer la pérennité de l'association SAMC.</p>
        <div class="imgfinance">
            <img src="img/financement1.webp" alt="Chateau La Fayette">
            <img src="img/financement2.webp" alt="Chateau La Fayette">
            <img src="img/financement3.webp" alt="Chateau La Fayette">
        </div>
        <h3>Cagnotte</h3>
    </div>
    <div id="progress-container">
        <div id="progress-bar">
            <div id="progress"></div>
        </div>
        <div id="amount-text">0 €</div>

        <script>
        //script cagnotte

        function updateProgressBar(amount, maxAmount) {
            const progress = document.getElementById('progress');
            const amountText = document.getElementById('amount-text');

            const percentage = (amount / maxAmount) * 100;
            progress.style.setProperty('--progress-width', percentage + '%');

            amountText.textContent = amount + ' €';
        }

        // Exemple d'utilisation : Mettez à jour la barre de progression avec le montant actuel de la cagnotte
        const currentAmount = 250; // Montant actuel de la cagnotte en euros
        const maxAmount = 1000; // Montant maximum de la cagnotte en euros
        updateProgressBar(currentAmount, maxAmount);
        </script>
</body>

</html>