<?php
include_once __DIR__ . '/private/authentication_systeme/try_auto_connection.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once "master_dependencies_head.php" ?>
    <title>Billetterie - <?= $title ?></title>
    <meta name="billetterie Hamilton" content="Réservez vos billets pour Hamilton au Château Chavanac Lafayette ! Vivez une expérience théâtrale unique dans un cadre historique. Ne manquez pas cette interprétation moderne de l'histoire d'Alexander Hamilton. Billets limités, réservez maintenant !">
    <meta property="og:title" content="Billetterie d'<?= $title ?>">
    <meta property="og:description" content="Réservez vos billets pour Hamilton au Château Chavanac Lafayette !">
    <meta property="og:url" content="https://hamilton.helie.me/billetterie">
    <meta name="twitter:title" content="Billetterie d'<?= $title ?>">
    <meta name="twitter:description" content="Réservez vos billets pour Hamilton au Château Chavanac Lafayette !">
    <link rel="stylesheet" type="text/css" href="styles/style_billetterie.css">
    <script src="javascripts/billetterie.js" defer></script>
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
            <p>Ce billet comprend une entrée prioritaire avec une rencontre des artistes à la fin du spectacle.<br>
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

<?php
    include_once 'footer.php'
?>
 </body>
 </html>
