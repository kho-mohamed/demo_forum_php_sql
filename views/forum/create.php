<h1>Publier un article au forum</h1>
<form action="?controller=forum&function=store" method="post">
    <label for="titre">Titre</label>
    <input type="text" id="titre" name="titre" value="" minlength="5" maxlength="100">
    <label for="article">Article</label>
    <!-- <input type="text" id="article" name="article" value="<?= $data['article']; ?>"> -->
    <textarea id="article" name="article" rows="10" cols="50" minlength="10" maxlength="1000"
        placeholder="Écrivez votre article ici...">
    </textarea>
    <label for="date">Date de publication</label>
    <input type="date" id="date" name="date" value="<?= date('Y-m-d') ?>" readonly>

    <!-- <input type="hidden" id="id_utilisateur" name="id_utilisateur" value="<?= $data ?>" readonly> -->
    <input type="text" id="id_utilisateur" name="id_utilisateur" value="<?php echo $data['id_utilisateur']['id']; ?>">
    <input type="submit" value="Publier" class="btn">
</form>