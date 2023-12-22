<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="/image/png" sizes="16x16" href="img/favicons/favicon-16.ico">
<link rel="icon" type="/image/png" sizes="32x32" href="img/favicons/favicon-32.ico">
<link rel="icon" type="/image/png" sizes="64x64" href="img/favicons/favicon-64.ico">
<link rel="shortcut icon" href="/img/favicons/favicon.png">
<link rel="stylesheet" type="text/css" href="/styles/design_system.css">
<link rel="stylesheet" href="/styles/fonts.css">
<link rel="stylesheet" href="/styles/header.css">
<script src="/javascripts/header.js" defer></script>
<script>
    var user = {
        id: <?= isset($user->id) ? $user->id : "null" ?>
    }
</script>
<?php $title = "Hamilton, la comédie musicale en France" ?>
<meta name="keywords" content="Hamilton, comédie musicale, France, Château La Fayette, Musée Crozatier, spectacle, histoire, Guerre d'indépendance des États-Unis"/>

<meta property="og:type" content="website">
<meta property="og:site_name" content="Hamilton, la comédie musicale en France">
<meta property="og:locale" content="fr_FR">
<?php
//<meta property="og:image" content="URL de l'image à afficher">
//<meta name="twitter:card" content="summary_large_image">
//<meta name="twitter:image" content="URL de l'image à afficher">
?>