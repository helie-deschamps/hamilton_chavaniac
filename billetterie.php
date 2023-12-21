<?php
//include_once __DIR__ . '/private/authentication_systeme/try_auto_connection.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billetterie</title>
    <link rel="stylesheet" type="text/css" href="styles/design_system.css">
    <link rel="stylesheet" type="text/css" href="styles/fonts.css">
    <link rel="stylesheet" type="text/css" href="styles/style_billetterie.css">
</head>
<?php
    include 'header.php'
?>
<body>
<div class="image-bandeau">
    <img src="img/bandeau-billetterie.webp" alt="bandeau">
</div>

<div class="flex-billets">
    <div class="billet billet-jaune">
        <div class="face-avant">
            <img src="img/billet-rencontre.webp" alt="billet-rencontre">
        </div>
        <div class="face-arriere">
            <p>LIMITÉ À 20 PLACES!<br>
            Ce billet comprend une entrée prioritaire avec une rencontre des artistes à la fin du spectacle.<br>
            Ceci est une prévente, aucun paiement en ligne ne peut être effectué. 
            Le paiement s’effectuera sur place le jour du spectacle.
            Le nombre de préventes disponibles correspond aux nombres de places totales pour l’évènement.<br>
            105€ </p>
       
            <div class="bouton-billet">
                <div class="quantity-selector">
                    <button class="quantity-btn decrease">-</button>
                    <input type="text" class="quantity-input" value="1" min="1">
                    <button class="quantity-btn increase">+</button>
                </div>
                <button class="add-to-cart-btn">AJOUTER AU PANIER</button>
            </div>
        </div>
    </div>
    <div class="billet billet-marron">
        <div class="face-avant">
            <img src="img/billet-tarifplein.webp" alt="billet-tarifplein">
        </div>
        <div class="face-arriere">
        <p>Ce billet est destiné aux adultes et aux enfant de plus de 12 ans n’étant pas étudiant. Ceci est une prévente, aucun paiement en ligne ne peut être effectué. <br>
        Le paiement s’effectuera sur place le jour du spectacle.
        Le nombre de préventes disponibles correspond aux nombres de places totales pour l’évènement.<br>
        70€ </p>

        <div class="bouton-billet">
                <div class="quantity-selector">
                    <button class="quantity-btn decrease">-</button>
                    <input type="text" class="quantity-input" value="1" min="1">
                    <button class="quantity-btn increase">+</button>
                </div>
                <button class="add-to-cart-btn">AJOUTER AU PANIER</button>
            </div>

        </div>
    </div>

    <div class="billet billet-rouge">
        <div class="face-avant">
            <img src="img/billet-enfant.webp" alt="billet-enfant">
        </div>
        <div class="face-arriere">
        <p>Ce billet est destiné  aux enfant de moins de 12 ans accompagné obligatoirement d’un adulte. Ceci est une prévente, aucun paiement en ligne ne peut être effectué. <br>
        Le paiement s’effectuera sur place le jour du spectacle.
        Le nombre de préventes disponibles correspond aux nombres de places totales pour l’évènement.<br>
        50€ </p>

        <div class="bouton-billet">
                <div class="quantity-selector">
                    <button class="quantity-btn decrease">-</button>
                    <input type="text" class="quantity-input" value="1" min="1">
                    <button class="quantity-btn increase">+</button>
                </div>
                <button class="add-to-cart-btn">AJOUTER AU PANIER</button>
            </div>
        </div>
    </div>

    <div class="billet billet-vert">
        <div class="face-avant">
            <img src="img/billet-etudiant.webp" alt="billet-etudiant">
        </div>
        <div class="face-arriere">
        <p>Ce billet est destiné  aux étudiants valable seulement sur présentation d’une carte étudiante. Ceci est une prévente, aucun paiement en ligne ne peut être effectué. <br>
        Le paiement s’effectuera sur place le jour du spectacle.
        Le nombre de préventes disponibles correspond aux nombres de places totales pour l’évènement.<br>
        40€</p>

        <div class="bouton-billet">
                <div class="quantity-selector">
                    <button class="quantity-btn decrease">-</button>
                    <input type="text" class="quantity-input" value="1" min="1">
                    <button class="quantity-btn increase">+</button>
                </div>
                <button class="add-to-cart-btn">AJOUTER AU PANIER</button>
            </div>
        </div>
    </div>
</div>
<script src="billetterie.js"></script>

<?php
    include_once 'footer.php'
?>
 </body>
 </html>
