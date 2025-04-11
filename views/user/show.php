<h1>Page Utilisateur</h1>
<p><strong>Nom: </strong> <?php
echo $data['user']['nom']; ?></p>
<p><strong>Nom de l'Utilisateur: </strong> <?= $data['user']['nomUtilisateur']; ?></p>
<p><strong>Date de naissance: </strong> <?= $data['user']['dateNaissance']; ?></p>
<a href="?controller=forum&function=create&id=<?php
if (isset($_SESSION['id'])) {
    echo $_SESSION['id'];
}
?>" class="btn-annonce<?php
if (!isset($_SESSION['id'])) {
    echo ' disable';
}
?>">Faire une publication</a>


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
        foreach ($data['forum'] as $row) {
            ?>
            <tr>
                <td class="td-btn"><?= $row['id_forum']; ?></td>
                <td><?= $row['titre']; ?></td>
                <td class="td-btn"><?= $row['date']; ?></td>
                <td class="td-btn"> <a href="?controller=forum&function=edit&id=<?= $row['id_forum'] ?>" class="btn <?php
                  if (isset($_SESSION['id'])) {
                      if ($data['user']['id'] != $_SESSION['id']) {
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
                            if ($data['user']['id'] != $_SESSION['id']) {
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