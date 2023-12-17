<?php
include_once __DIR__ . '/private/authentication_systeme/try_connection.php';
?>
    <form id="form-conn" method="post">
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="checkbox" name="cookieAccepted" id="cookieAccepted">
        <input type="submit" value="Se connecter">
    </form>
    <form id="form-create-acc" method="post">
        <input type="text" name="email" placeholder="Email" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="number" name="icon_id" placeholder="Icone" required>
        <input type="checkbox" name="cookieAccepted" id="cookieAccepted">
        <input type="submit" value="Crée mon compte">
    </form>
<?= $user->username ?? "" ?>