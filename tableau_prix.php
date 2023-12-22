<?php

include_once __DIR__ . '/private/authentication_systeme/AuthSystem.php';

session_start();

$auth = AuthSystem::getInstance();
$user = null;

if (isset($_SESSION["connsessco"])) {
    $user = $auth->loginWithSession($_SESSION["connsessco"]);
}
if(empty($user->reservation)) {die('<a href="billetterie"><button>Précomander mes billets</button></a>');}
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
