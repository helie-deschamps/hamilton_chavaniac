<link rel="stylesheet" href="styles/fonts.css">
<link rel="stylesheet" href="styles/header.css">

<script src="javascripts/header.js" defer></script>

<header>

    <span id="left-header">
        <a href="/">Accueil</a>
        <a href="/spectacle">Spectacle</a>
        <a href="/samc">SAMC</a>
    </span>
    <img src="img/logo1.webp" alt="logo">
    <span id="right-header">
        <a href="/billetterie">Billeterie</a>
        <span id="connexion" class="<?= isset($user) && $user ? "connected" : "disconnected" ?>">
            <div class="data_user">
                <button>Ma pré-réservation</button>
                <button>
                    <img id="user_icon" src="/img/users_icons/<?= isset($user) && $user ? $user->code_icone : "" ?>.png" alt="icon de <?= $user->username ?? "" ?>">
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
        <h4>Reservation de <b id="username"><?= isset($user) && $user ? $user->username : "" ?></b>.</h4>
        <?php if(isset($user) && !empty($user->reservation)):?>
            <div id="ci_tableau_prix">
                <?php
                if($user->reservation->countParticipants(105) > 0):?>
                    <div>
                        <p class="ci_tp_title">Nombre de place au tarif jeunes (<b>105€</b>)</p>
                        <p class="ci_tp_dash">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                        <p class="ci_tp_quantity"><?= $user->reservation->countParticipants(105) ?></p>
                    </div>
                <?php endif;?>
                <div>
                    <p class="ci_tp_title">Nombre de place au tarif étudiants (<b>70€</b>)</p>
                    <p class="ci_tp_dash">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                    <p class="ci_tp_quantity"><?= $user->reservation->countParticipants(70) ?></p>
                </div>
                <div>
                    <p class="ci_tp_title">Nombre de place au tarif normal (<b>50€</b>)</p>
                    <p class="ci_tp_dash">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                    <p class="ci_tp_quantity"><?= $user->reservation->countParticipants(80) ?></p>
                </div>
                <div>
                    <p class="ci_tp_title">Nombre de place au tarif normal (<b>40€</b>)</p>
                    <p class="ci_tp_dash">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                    <p class="ci_tp_quantity"><?= $user->reservation->countParticipants(40) ?></p>
                </div>
                <?php foreach($user->reservation->tableauDePrix() as $prix): // $prix = [ prix (float), nombre de participants a ce prix (int) ]
                        if($prix[0] != 105 && $prix[0] != 70 && $prix[0] != 50 && $prix[0] != 40):
                 ?>
                    <div>
                        <p class="ci_tp_title">Nombre de place au tarif normal (<b><?= $prix?>€</b>)</p>
                        <p class="ci_tp_dash">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                        <p class="ci_tp_quantity"><?= $user->reservation->countParticipants($prix) ?></p>
                    </div>
                <?php endif; endforeach;?>
            </div>
            <p class="ci_total">Total due : <b id="price-total"><?= $user->reservation->prixTotal() ?></b>€</p>
        <?php else:?>
            <a href="billetterie"><button>Précomander mes billets</button></a>
        <?php endif;?>
        <p>Un mail vous sera envoyer a l’addresse : mail@amil.com, une semaine avant l’événement.</p>
        <p>Le payement se fera l’hors de l’événement.</p>
        <button id="disconnected_button">Me déconnecter</button>
    </div>
    <div id="forms-conner">
        <form id="form-conn" method="post">
            <h4>J’ai déja un compte</h4>
            <div>
                <label for="emaila1">E-mail</label>
                <input id="emaila1" type="email" name="email" placeholder="Mon addresse e-mail" required>
            </div>
            <div>
                <label for="passworda1">Mot de passe</label>
                <input id="passworda1" type="password" name="password" placeholder="Mon mot de passe" required>
            </div>
            <div class="cookies_cb_div">
                <input id="cookiesa1" type="checkbox" name="cookieAccepted">
                <label for="cookiesa1">J’acceptes l’utilisation utilisation de cookies pour ne pas à avoir à me reconnecter à chaque venu sur ce site.<br>Pour en savoir plus sur la manière dont nous utilisons les cookies et comment tu peux gérer tes préférences, consulte notre [lien vers la politique de confidentialité et de cookies].</label>
            </div>
            <input type="submit" value="Se connecter">
            <p>Un problème, contactez nous a l’adresse : <a href="mailto:oui.oui@non.non">oui.oui@non.non</a></p>
        </form>
        <form id="form-create-acc" method="post">
            <h4>Je shouaite crée un compte</h4>
            <div>
                <label for="emaila2">E-mail</label>
                <input id="emaila2" type="email" name="email" placeholder="Mon addresse e-mail" required>
            </div>
            <div>
                <label for="passworda2">Mot de passe</label>
                <input id="passworda2" type="password" name="password" placeholder="Mon mot de passe" required>
            </div>
            <div>
                <label for="usernamea2">Nom d’utilisateur</label>
                <input id="usernamea2" type="text" name="username" placeholder="Mon nom ou psuedo" required>
            </div>
            <div>
                <label for="usernamea2">Je choisis mon icone</label>
                <input type="number" name="icon_id" placeholder="Icone" required>
            </div>
            <div class="cookies_cb_div">
                <input id="cookiesa2" type="checkbox" name="cookieAccepted">
                <label for="cookiesa2">J’acceptes l’utilisation utilisation de cookies pour ne pas à avoir à me reconnecter à chaque venu sur ce site.<br>Pour en savoir plus sur la manière dont nous utilisons les cookies et comment tu peux gérer tes préférences, consulte notre [lien vers la politique de confidentialité et de cookies].</label>
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