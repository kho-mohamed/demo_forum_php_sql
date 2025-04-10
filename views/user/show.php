<h1>Page Utilisateur</h1>
<p><strong>Nom: </strong> <?php
echo $data[0]['nom']; ?></p>
<p><strong>Nom de l'Utilisateur: </strong> <?= $data[0]['nomUtilisateur']; ?></p>
<p><strong>Date de naissance: </strong> <?= $data[0]['dateNaissance']; ?></p>
<a href="?controller=forum&function=create&id=<?= $data[0]['id'] ?>" class="btn">Faire une publication</a>

<table>
    <thead>
        <tr>
            <th>id publication</th>
            <th>Titre</th>
            <th>Date de publication</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $row) {
            ?>
            <tr>
                <td><?= $row['id_forum']; ?></td>
                <td><?= $row['titre']; ?></td>
                <td><?= $row['date']; ?></td>
                <td> <a href="?controller=forum&function=edit&id=<?= $row['id_forum'] ?>" class="btn">Modifier</a></td>
                <td>
                    <form action="?controller=forum&function=delete" method="post">
                        <input type="hidden" name="id_utilisateur" value="<?= $data[0]['id_utilisateur']; ?>">
                        <input type="hidden" name="id" value="<?= $row['id_forum']; ?>">
                        <input type="submit" value="Supprimer" class="btn-danger">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>