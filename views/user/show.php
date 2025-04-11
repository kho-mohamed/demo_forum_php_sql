<h1>Page Utilisateur</h1>
<p><strong>Nom: </strong> <?php
echo $data[0]['nom']; ?></p>
<p><strong>Nom de l'Utilisateur: </strong> <?= $data[0]['nomUtilisateur']; ?></p>
<p><strong>Date de naissance: </strong> <?= $data[0]['dateNaissance']; ?></p>
<a href="?controller=forum&function=create&id=<?= $data[0]['id'] ?>" class="btn-annonce">Faire une publication</a>

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
                <td class="td-btn"><?= $row['id_forum']; ?></td>
                <td><?= $row['titre']; ?></td>
                <td class="td-btn"><?= $row['date']; ?></td>
                <td class="td-btn"> <a href="?controller=forum&function=edit&id=<?= $row['id_forum'] ?>" class="btn <?php
                  if (isset($_SESSION['id'])) {
                      if ($data[0]['id_utilisateur'] != $_SESSION['id']) {
                          echo " disable";
                      }
                  }
                  if (!isset($_SESSION["id"])) {
                      echo " disable";
                  }
                  ?>">Modifier</a>
                </td>
                <td class="td-btn">
                    <form action="?controller=forum&function=delete" method="post">
                        <input type="hidden" name="id_utilisateur" value="<?= $data[0]['id_utilisateur']; ?>">
                        <input type="hidden" name="id" value="<?= $row['id_forum']; ?>">
                        <input type="submit" value="Supprimer" class="btn-rouge <?php if (isset($_SESSION['id'])) {
                            if ($data[0]['id_utilisateur'] != $_SESSION['id']) {
                                echo " disable";
                            }
                        }
                        if (!isset($_SESSION["id"])) {
                            echo " disable";
                        } ?>">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>