<?php
include_once __DIR__ . '/private/authentication_systeme/try_auto_connection.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once "master_dependencies_head.php" ?>
    <title><?= $title ?></title>
    <meta name="description" content="Découvrez l'événement musical incontournable de l'année : la première représentation de la comédie musicale « Hamilton » en France, au prestigieux Château La Fayette. Présentée avec passion par la Société des Amis du Musée Crozatier, cette soirée promet une expérience unique mêlant histoire, musique et spectacle. Réservez vos places dès maintenant pour une soirée mémorable où la magie du théâtre rencontre le charme du patrimoine français.">
    <meta property="og:title" content="<?= $title ?>">
    <meta property="og:description" content="Découvrez l'événement musical incontournable de l'année : la première représentation de la comédie musicale « Hamilton » en France, au prestigieux Château La Fayette.">
    <meta property="og:url" content="https://hamilton.helie.me/">
    <meta name="twitter:title" content="<?= $title ?>">
    <meta name="twitter:description" content="Découvrez l'événement musical incontournable de l'année : la première représentation de la comédie musicale « Hamilton » en France, au prestigieux Château La Fayette.">
    <script src="javascripts/anim.js"></script>
    <link href="styles/style_homepage.css" rel="stylesheet"/>
</head>
<body>
   
<?php
    include "header.php";
?>
    <h1>Hamilton, la comédie musicale</h1>

    <figure class=imageindex>
        <img src="img/imageindex.webp" alt="photo accueil"> 
        <figcaption>Une première en France</figcaption>
    </figure>

    <p class = "texteintro">Nous sommes ravis de vous accueillir pour un événement historique et culturel sans précédent : la première représentation française de la comédie musicale révolutionnaire, Hamilton. Cette production acclamée, qui a captivé le cœur d'audiences à travers le monde, arrive enfin en France, dans le cadre majestueux du Château Lafayette.

Hamilton est plus qu'une comédie musicale, c'est une expérience immersive qui transporte le public dans l'effervescence de l'histoire américaine. Avec un mélange innovant de musique hip-hop, jazz, R&B et Broadway, Hamilton raconte l'histoire du père fondateur Alexander Hamilton de manière actuelle et captivante, une histoire de pouvoir, de politique, et de la passion qui a façonné une nation.

Le Château Lafayette, un lieu empreint d'histoire et d'élégance, offre le décor parfait pour cette première française. Son architecture grandiose et ses jardins somptueux complètent l'éclat et l'audace de la production, offrant aux spectateurs une expérience théâtrale inoubliable.

Nous vous invitons à nous rejoindre pour célébrer l'art, l'histoire et le génie musical. Les billets sont désormais disponibles pour cette série de représentations limitées. Réservez votre place et soyez témoin de l'histoire en marche, ici, au cœur de la France, au Château Lafayette.</p>
 
<h1>Carousel des chansons</h1>
    <div class="carousel">
        <button class="carousel-button prev">Précédent</button>
            <div class="carousel-track-container">
                <ul class="carousel-track">
                            <li class="carousel-slide">
                                <iframe width="919" height="517" src="https://www.youtube.com/embed/ibiXMtfG6a8" title="&quot;Burn&quot; from HAMILTON" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </li>
                            <li class="carousel-slide">
                                <iframe width="919" height="517" src="https://www.youtube.com/embed/cuyMAneJqms" title="&quot;Alexander Hamilton&quot; from HAMILTON" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </li>
                            <li class="carousel-slide">
                                <iframe width="919" height="517" src="https://www.youtube.com/embed/8da1KdwgwFE" title="&quot;The Schuyler Sisters&quot; from HAMILTON" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </li>
                            <li class="carousel-slide">
                                <iframe width="919" height="517" src="https://www.youtube.com/embed/vYbdQAeO0vo" title="&quot;Non-Stop&quot; from HAMILTON" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </li>
                            <li class="carousel-slide">
                                <iframe width="919" height="517" src="https://www.youtube.com/embed/PyD6jeDBoDo" title="&quot;You&#39;ll Be Back&quot; from HAMILTON" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </li>
                            <li class="carousel-slide">
                                <iframe width="919" height="517" src="https://www.youtube.com/embed/lZ4UmlFNdSI" title="&quot;My Shot&quot; from HAMILTON" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </li>
                            <li class="carousel-slide">
                                <iframe width="919" height="517" src="https://www.youtube.com/embed/JDL6R2KS3xg" title="&quot;Guns and Ships&quot; from HAMILTON" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </li>
                            <li class="carousel-slide">
                                <iframe width="919" height="517" src="https://www.youtube.com/embed/uq4A7iqjBRk" title="&quot;Ten Duel Commandments&quot; from HAMILTON" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </li>
                </ul>
            </div>
        <button class="carousel-button next">Suivant</button>
    </div>

    <p class = "texteintro">Vous avez été captivé par les chansons, maintenant préparez-vous à être complètement emporté par la magie visuelle et l'énergie vibrante de "Hamilton". Nous sommes ravis de partager avec vous la bande-annonce officielle de la comédie musicale, une fenêtre sur le monde éblouissant que nous avons créé.</p>

<div class = trailer>
    <iframe width="919" height="517" src="https://www.youtube.com/embed/DSCKfXpAGHc" title="Hamilton | Official Trailer | Disney+" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>    

<?php include_once"footer.php" ?>

</body>
</html>
