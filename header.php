<link rel="stylesheet" href="styles/fonts.css">
<link rel="stylesheet" href="styles/header.css">

<script src="javascripts/header.js" defer></script>

<header>

    <span id="left-header">
        <a href="/">Accueil</a>
        <a href="/spectacle">Spectacle</a>
        <a href="/samc">SAMC</a>
    </span>
    <img src="img/logo1.png" alt="logo">
    <span id="right-header">
        <a href="/billetterie">Billeterie</a>
        <span id="connexion" class="<?= isset($user) && $user ? "connected" : "disconnected" ?>">
            <div class="data_user">
                <button>Ma pré-réservation</button>
                <button>
                    <img id="user_icon" src="/img/users_icons/<?= $user?->code_icone ?? "" ?>.png" alt="icon de <?= $user->username ?? "" ?>">
                </button>
            </div>
            <div class="button_connection">
                <button>Me connecter</button>
            </div>
        </span>
    </span>

</header>

<div id="connection_modal-background">
</div>
<dialog id="connection_modal" class="<?= isset($user) && $user ? "connected" : "disconnected" ?>">
    <div id="connection_infos">
        UwU
    </div>
    <div id="forms-conner">
        <form id="form-conn" method="post">
            <div>
                <label for="emaila1">Email</label>
                <input id="emaila1" type="text" name="email" placeholder="Email" required>
            </div>
            <div>
                <label for="passworda1">Mot de passe</label>
                <input id="passworda1" type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <div>
                <input id="cookiesa1" type="checkbox" name="cookieAccepted">
                <label for="cookiesa1">J'accepte les cookies</label>
            </div>
            <input type="submit" value="Se connecter">
        </form>
        <form id="form-create-acc" method="post">
            <div>
                <label for="emaila2">Email</label>
                <input id="emaila2" type="text" name="email" placeholder="Email" required>
            </div>
            <div>
                <label for="passworda2">Mot de passe</label>
                <input id="passworda2" type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <div>
                <label for="usernamea2"></label>
                <input id="usernamea2" type="text" name="username" placeholder="Username" required>
            </div>
            <input type="number" name="icon_id" placeholder="Icone" required>
            <div>
                <input id="cookiesa2" type="checkbox" name="cookieAccepted">
                <label for="cookiesa2">J'accepte les cookies</label>
            </div>
            <input type="submit" value="Crée mon compte">
        </form>
    </div>
</dialog>
<dialog id="notification_modal" class="minified_modal">
    <div id="notification_infos">
        Bonjour, vous avez 1 pré-réservation en cours.
    </div>
    <div>
        <button id="notification_modal_close">Fermer</button>
    </div>
</dialog>