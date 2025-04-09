<?php

// la fonction selectionne les forums et les utilisateurs qui ont posté ces forums:
function forum_select()
{
    require(CONNEX_DIR);
    $sql = "SELECT forum.*, utilisateur.nom, utilisateur.dateNaissance FROM forum INNER JOIN utilisateur ON utilisateur.id = id_utilisateur ORDER BY date";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
}

function forum_insert($request)
{
    require(CONNEX_DIR);
    foreach ($request as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $sql = "INSERT INTO forum (titre, article, date, id_utilisateur)  VALUES ('$titre', '$article', '$date', '$id_utilisateur')";
    $result = mysqli_query($connex, $sql);
    if ($result) {
        return $id_utilisateur;
    } else {
        return false;
    }
}


function forum_select_id($id)
{
    require(CONNEX_DIR);
    $id = mysqli_real_escape_string($connex, $id);
    $sql = "SELECT forum.*,utilisateur.* FROM forum INNER JOIN utilisateur ON utilisateur.id = id_utilisateur WHERE id_utilisateur = '$id';";
    $result = mysqli_query($connex, $sql);

    $count = mysqli_num_rows($result);
    if ($count != 0) {
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    } else {
        return false;
    }
}


function forum_update($request)
{
    require(CONNEX_DIR);
    foreach ($request as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $sql = "UPDATE forum SET titre = '$titre', date = '$date', article='$article' WHERE id_forum = '$id'";

    if (mysqli_query($connex, $sql)) {
        return true;
    } else {
        return false;
    }
}
