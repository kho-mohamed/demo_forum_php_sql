<h1>Modification d'une putlication</h1>
<form action="?controller=forum&function=update" method="post">
    <input type="hidden" name="id" value="<?= $data['id_forum']; ?>">
    <label for="titre">Titre</label>
    <input type="text" id="titre" name="titre" value="<?= $data['titre']; ?>" minlength="5" maxlength="100">
    <label for="article">Article</label>
    <textarea id="article" name="article" rows="10" cols="50" minlength="10" maxlength="1000"><?= $data['article']; ?>
</textarea>
    <label for="date">Date de publication</label>
    <input type="date" id="date" name="date" value="<?= $data['date']; ?>">
    <label for="id_utilisateur">Votre ID</label>
    <input type="text" id="id_utilisateur" name="id_utilisateur" value="<?= $data['id_utilisateur'] ?>" readonly>
    <input type="submit" value="Modifier" class="btn">
</form>