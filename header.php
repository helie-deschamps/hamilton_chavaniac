<header>
    <span class="burger_menu burger_menu_void"></span>
    <span id="left-header">
        <a href="/">Accueil</a>
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
    <span class="burger_menu">
        <input id="burger_menu_checkbox" type="checkbox">
    </span>
</header>

<div id="connection_modal-background">
    <p>Fermer</p>
</div>
<dialog id="connection_modal" class="<?= isset($user) && $user ? "connected" : "disconnected" ?>">
    <div id="connection_infos">
        <h4>Reservation de <b id="username"><?= isset($user) && $user ? $user->username : "" ?></b>.</h4>
        <?php if(isset($user) && !empty($user->reservation)):?>
            <div id="ci_tableau_prix">
                <?php
                if($user->reservation->countParticipants(105) > 0):?>
                    <div>
                        <p class="ci_tp_title">Nombre de place au tarif rencontre (<b>105€</b>)</p>
                        <p class="ci_tp_dash">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                        <p class="ci_tp_quantity"><?= $user->reservation->countParticipants(105) ?></p>
                    </div>
                <?php endif;?>
                <div>
                    <p class="ci_tp_title">Nombre de place au tarif normal (<b>70€</b>)</p>
                    <p class="ci_tp_dash">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                    <p class="ci_tp_quantity"><?= $user->reservation->countParticipants(70) ?></p>
                </div>
                <div>
                    <p class="ci_tp_title">Nombre de place au tarif étudiant (<b>50€</b>)</p>
                    <p class="ci_tp_dash">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                    <p class="ci_tp_quantity"><?= $user->reservation->countParticipants(80) ?></p>
                </div>
                <div>
                    <p class="ci_tp_title">Nombre de place au tarif enfant (<b>40€</b>)</p>
                    <p class="ci_tp_dash">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                    <p class="ci_tp_quantity"><?= $user->reservation->countParticipants(40) ?></p>
                </div>
                <?php foreach($user->reservation->tableauDePrix() as $prix): // $prix = [ prix (float), nombre de participants a ce prix (int) ]
                        if($prix[0] != 105 && $prix[0] != 70 && $prix[0] != 50 && $prix[0] != 40):
                 ?>
                    <div>
                        <p class="ci_tp_title">Nombre de place au tarif spécial de <b><?= $prix[0]?>€</b></p>
                        <p class="ci_tp_dash">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                        <p class="ci_tp_quantity"><?= $user->reservation->countParticipants($prix[0]) ?></p>
                    </div>
                <?php endif; endforeach;?>
                <p class="ci_total">Total due : <b id="price-total"><?= $user->reservation->prixTotal() ?></b>€</p>
            </div>
        <?php else:?>
            <div id="ci_tableau_prix">
                <a href="billetterie"><button>Précomander mes billets</button></a>
            </div>
        <?php endif;?>
        <p>Un mail vous sera envoyé a l’addresse : <b id="user-mail_"><?= isset($user) && $user ? $user->email : "" ?></b>, une semaine avant l’événement..</p>
        <p>Le payement se fera lors de l’événement.</p>
        <button id="disconnected_button">Me déconnecter</button>
    </div>
    <div id="forms-conner">
        <form id="form-conn" method="post">
            <h4>J’ai déjà un compte</h4>
            <div>
                <label for="emaila1">E-mail</label>
                <input id="emaila1" type="email" name="email" placeholder="Mon addresse e-mail" required>
            </div>
            <div>
                <label for="passworda1">Mot de passe</label>
                <input id="passworda1" type="password" name="password" placeholder="Mon mot de passe" pattern="(?=.*[a-z])(?=.*[A-Z]).{7,200}" required>
            </div>
            <div class="cookies_cb_div">
                <input id="cookiesa1" type="checkbox" name="cookieAccepted">
                <label for="cookiesa1">J’accepte l’utilisation de cookies pour ne pas avoir à me reconnecter à chaque visite sur ce site.</label>
            </div>
            <input type="submit" value="Se connecter">
            <p>Un problème, contactez nous à l’adresse : <a href="mailto:contact@hamilton-samc.fr">contact@hamilton-samc.fr</a></p>
        </form>
        <form id="form-create-acc" method="post">
            <h4>Je shouaite créer un compte</h4>
            <div>
                <label for="emaila2">E-mail</label>
                <input id="emaila2" type="email" name="email" placeholder="Mon addresse e-mail" required>
            </div>
            <div>
                <label for="passworda2">Mot de passe</label>
                <input id="passworda2" type="password" name="password" placeholder="Mon mot de passe" pattern="(?=.*[a-z])(?=.*[A-Z]).{7,200}" required>
            </div>
            <p>Votre mot de passe doit contenir une lettre minuscule et une majuscule et sa longueur doit être entre 7 et 200 caractères.</p>
            <div>
                <label for="usernamea2">Nom d’utilisateur</label>
                <input id="usernamea2" type="text" name="username" placeholder="Mon nom ou pseudo" required>
            </div>
            <div>
                <label for="iconea2">Je choisis mon icône</label>
                <input id="iconea2" type="number" name="icon_id" placeholder="Icone" required value="1">
                <i id="icon-selected">Alexander Hamilton</i>
            </div>
            <?php $nameIcones = [
                "Alexander Hamilton",
                "Aaron Burr",
                "Marquis de La Fayette",
                "Eliza Schuyler",
                "Angelica Schuyler",
                "George Washington",
                "King George III",
                "Thomas Jefferson",
            ] ?>
            <div id="icone-choice-div">
                <?php for($i = 1; $i <= 8; $i++):?>
                    <img id="icone-choice-<?= $i ?>" class="icone-choice<?= $i==1?" icone-choice-selected":"" ?>" src="/img/users_icons/<?= $i ?>.png" alt="icon de <?= $i ?>" title="<?= $nameIcones[$i-1] ?>">
                <?php endfor;?>
            </div>
            <div class="cookies_cb_div">
                <input id="cookiesa2" type="checkbox" name="cookieAccepted">
                <label for="cookiesa2">J’accepte l’utilisation de cookies pour ne pas avoir à me reconnecter à chaque visite sur ce site.</label>
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