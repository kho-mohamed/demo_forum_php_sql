<h1>Créer un Utilisateur</h1>
<form action="?controller=user&function=store" method="post">
    <label for="name">Nom</label>
    <input type="text" id="name" name="name" pattern="^[A-Za-z]{2,25}$" minlength="2" maxlength="25">
    <label for="username">Nom de l'Utilisateur</label>
    <input type="email" id="username" name="username">
    <label for="pwd">Mot de passe</label>
    <input type="password" id="pwd" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d).+$" minlength="6" maxlength="20">
    <label for="birthday">date de naissance</label>
    <input type="date" id="birthday" name="birthday" max="2013-12-31">
    <input type="submit" value="Save">
</form>