<?php
include_once __DIR__ . '/private/authentication_systeme/try_auto_connection.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        carousel

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
            <h3>Dons</h3>
            <button> Faites un dons</button>
            <h3>Cagnotte</h3>
        </div>
        <div id="progress-container">
            <div id="progress-bar">
                <div id="progress"></div>
            </div>
            <div id="amount-text">0 €</div>

            <script>
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