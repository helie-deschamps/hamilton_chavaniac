<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Hamilton</title>
    <style>
    body {
        background-color: rgb(32, 32, 32);
        font-family: "afacad";
        color: #ffffff;
    }

    .faq {
        margin-top:5% ;
        margin-bottom:5% ;
        margin-left:10% ;
        margin-right: 10%;
    }

    .faq-question {
        cursor: pointer;
        font-weight: bold;
        margin-bottom: 10px;
        color: #E6E5E5;
        display: flex;
        align-items: center;
        font-size: 30px;
    }

    .faq-answer {
        display: none;
        margin-bottom: 20px;
        font-size: 20px;
    }

    .arrow {
        margin-left: 10px;
        color: rgb(182, 120, 35);
        /* Bleu foncé */

    }

    .rotate {
        transform: rotate(90deg);
        transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
        /* Ajoutez une transition de couleur */
    }
    </style>
    <script>
    function toggleAnswer(questionId, arrowId) {
        var answer = document.getElementById(questionId + '-answer');
        var arrow = document.getElementById(arrowId);

        if (answer.style.display === 'none') {
            answer.style.display = 'block';
            arrow.classList.add('rotate');
        } else {
            answer.style.display = 'none';
            arrow.classList.remove('rotate');
        }
    }
    </script>
</head>

<body>
    <?php
include "header.php";
?>
    <div class="faq">
        <div class="faq-question" onclick="toggleAnswer('hamilton-1', 'arrow-1')">
            Qui est Hamilton ?
            <div id="arrow-1" class="arrow">&#9658;</div>
        </div>
        <div id="hamilton-1-answer" class="faq-answer">
            Alexander Hamilton était l'un des Pères fondateurs des États-Unis, un homme politique et le premier
            secrétaire du Trésor, dont la vie est au centre de la comédie musicale "Hamilton”.
        </div>

        <div class="faq-question" onclick="toggleAnswer('hamilton-2', 'arrow-2')">
            Qu'est-ce que "Hamilton" et de quoi parle-t-elle ?
            <div id="arrow-2" class="arrow">&#9658;</div>
        </div>
        <div id="hamilton-2-answer" class="faq-answer">
            "Hamilton" est une comédie musicale qui narre la vie d'Alexander Hamilton, l'un des Pères fondateurs des
            États-Unis, à travers un mélange de hip-hop et de musique de comédie musicale.
        </div>
        <div class="faq-question" onclick="toggleAnswer('hamilton-3', 'arrow-3')">
            Quel est le style musical dominant dans "Hamilton <div id="arrow-3" class="arrow">&#9658;</div>
        </div>
        <div id="hamilton-3-answer" class="faq-answer">
            Le hip-hop est le style musical dominant, mais la pièce incorpore également du R&B et de la musique
            traditionnelle de comédie musicale.

        </div>
        <div class="faq-question" onclick="toggleAnswer('hamilton-4', 'arrow-4')">
            Quand et où la pièce "Hamilton" a-t-elle fait ses débuts ?
            <div id="arrow-4" class="arrow">&#9658;</div>
        </div>
        <div id="hamilton-4-answer" class="faq-answer">
            "Hamilton" a fait ses débuts à Broadway au Richard Rodgers Theatre le 6 août 2015.
        </div>
        <div class="faq-question" onclick="toggleAnswer('hamilton-5', 'arrow-5')">
            Quels sont les thèmes principaux abordés dans la pièce ?
            <div id="arrow-5" class="arrow">&#9658;</div>
        </div>
        <div id="hamilton-5-answer" class="faq-answer">
            Immigration, révolution, pouvoir, ambition et relations personnelles sont les thèmes principaux de
            "Hamilton".
        </div>
        <div class="faq-question" onclick="toggleAnswer('hamilton-6', 'arrow-6')">
            Quelle est la durée approximative de la pièce ?
            <div id="arrow-6" class="arrow">&#9658;</div>
        </div>
        <div id="hamilton-6-answer" class="faq-answer">
            La durée de "Hamilton" est d'environ 2 heures et 45 minutes, y compris l'entracte.
        </div>
        <div class="faq-question" onclick="toggleAnswer('hamilton-7', 'arrow-7')">
            Quels sont les principaux personnages dans "Hamilton" ?
            <div id="arrow-7" class="arrow">&#9658;</div>
        </div>
        <div id="hamilton-7-answer" class="faq-answer">
            Les principaux personnages incluent Alexander Hamilton, La Fayette, Aaron Burr, Eliza Hamilton, George
            Washington et d'autres figures historiques.
        </div>
        <div class="faq-question" onclick="toggleAnswer('hamilton-8', 'arrow-8')">
            Comment la pièce aborde-t-elle la diversité dans le casting ?
            <div id="arrow-8" class="arrow">&#9658;</div>
        </div>
        <div id="hamilton-8-answer" class="faq-answer">
            "Hamilton" est saluée pour son casting diversifié, avec des acteurs de différentes origines ethniques jouant
            des
            rôles historiques traditionnellement interprétés par des acteurs blancs.
        </div>
        <div class="faq-question" onclick="toggleAnswer('hamilton-9', 'arrow-9')">
            Quels sont les prix remportés par "Hamilton" ?
            <div id="arrow-9" class="arrow">&#9658;</div>
        </div>
        <div id="hamilton-9-answer" class="faq-answer">
            "Hamilton" a remporté de nombreux prix, dont le prix Pulitzer de la meilleure œuvre dramatique et plusieurs
            Tony
            Award de la meilleur comédie musicale.
        </div>
        <div class="faq-question" onclick="toggleAnswer('hamilton-10', 'arrow-10')">
            Où puis-je acheter des billets pour voir "Hamilton" en spectacle ?
            <div id="arrow-10" class="arrow">&#9658;</div>
        </div>
        <div id="hamilton-10-answer" class="faq-answer">
            Les billets pour "Hamilton" sont disponibles sur le site officiel de la comédie musicale et via des
            revendeurs autorisés.
        </div>
    </div>
</body>

</html>