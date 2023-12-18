<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billetterie</title>
    <link rel="stylesheet" type="text/css" href="styles/fonts.css">
    <link rel="stylesheet" type="text/css" href="styles/style_billetterie.css">
</head>
<body>
<?php
include "header.html";
?>
<div class="image-bandeau">
    <img src="img/bandeau-billetterie.png" alt="bandeau">
</div>

<div class="flex-billets">
    <div class="billet">
        <div class="face-avant">
            <img src="img/billet-rencontre.png" alt="billet-rencontre">
        </div>
        <div class="face-arriere">
        <p>Ce billet comprend une entrée prioritaire avec une rencontre des artistes à la fin du spectacle. <br>
        Limité à 20 billets ! <br>
        Ceci est une prévente, aucun paiement en ligne ne peut être effectué. 
        Le paiement s’effectuera sur place le jour du spectacle.
        Le nombre de préventes disponibles correspond aux nombres de places totales pour l’évènement. </p>

        </div>
    </div>

    <div class="billet">
        <div class="face-avant">
            <img src="img/billet-tarifplein.png" alt="billet-tarifplein">
        </div>
        <div class="face-arriere">
        <p>Ce billet est destiné aux adultes et aux enfant de plus de 12 ans n’étant pas étudiant. Ceci est une prévente, aucun paiement en ligne ne peut être effectué. <br>
Le paiement s’effectuera sur place le jour du spectacle.
Le nombre de préventes disponibles correspond aux nombres de places totales pour l’évènement. 
 </p>

        </div>
    </div>

    <div class="billet">
        <div class="face-avant">
            <img src="img/billet-enfant.png" alt="billet-enfant">
        </div>
        <div class="face-arriere">
        <p>Ce billet est destiné  aux enfant de moins de 12 ans accompagné obligatoirement d’un adulte. Ceci est une prévente, aucun paiement en ligne ne peut être effectué. <br>
Le paiement s’effectuera sur place le jour du spectacle.
Le nombre de préventes disponibles correspond aux nombres de places totales pour l’évènement. </p>



        </div>
    </div>

    <div class="billet">
        <div class="face-avant">
            <img src="img/billet-etudiant.png" alt="billet-rencontre">
        </div>
        <div class="face-arriere">
        <p>Ce billet est destiné  aux étudiants valable seulement sur présentation d’une carte étudiante. Ceci est une prévente, aucun paiement en ligne ne peut être effectué. <br>
Le paiement s’effectuera sur place le jour du spectacle.
Le nombre de préventes disponibles correspond aux nombres de places totales pour l’évènement. </p>
        </div>
    </div>
</div>
 </body>
 </html>
