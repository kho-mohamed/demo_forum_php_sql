<h1>Listes de toutes les publications</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Article</th>
            <th>Date de publications</th>
            <th>Nom</th>
            <th>Show</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $row) {
            ?>
            <tr>
                <td><?= $row['id_forum']; ?></td>
                <td><?= $row['titre']; ?></td>
                <td><?= $row['article']; ?></td>
                <td><?= $row['date']; ?></td>
                <td><?= $row['nom']; ?></td>
                <td><a href="?controller=user&function=show&id=<?= $row['id_utilisateur']; ?>">Show</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>