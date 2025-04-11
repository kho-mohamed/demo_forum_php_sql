<?php
if ($data == 1) {
    $msg = "utilisateur ou mot de passe incorrecte";
} else {
    $msg = "";
}

?>
<h1>Page de connection</h1>
<form action="?controller=user&function=auth" method="post">
    <?= "<span class='alerte'>" . $msg . "</span>"; ?>
    <label for="username">Nom d'utilisateur</label>
    <input type="text" id="username" name="username">
    <label for="pwd">Mot de passe</label>
    <input type="password" id="pwd" name="password">
    <input type="submit" value="Se connecter" class="btn">
</form>