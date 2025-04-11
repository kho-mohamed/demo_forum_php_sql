<h1><?php if (isset($_SESSION[""])) {
    echo $_SESSION["name"] . ", ";
} ?>Bienvenue sur le Forum du Collège Maisonneuve</h1>
<h1>Listes de toutes les publications</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Article</th>
            <th>Date de publications</th>
            <th>Nom</th>
            <th>action</th>
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
                <td><a href="?controller=user&function=show&id=<?= $row['id_utilisateur']; ?>">Voir plus</a>
                    <?php
                    if (isset($_SESSION['id']) && ($_SESSION['id'] == $row['id_utilisateur'])) {
                        echo '<a href="?controller=user&function=show&id=' . $row["id_utilisateur"] . 'Show</a>';
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>