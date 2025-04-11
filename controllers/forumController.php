<?php
//** fonction qui va afficher la page de toutes les publications. */
function forum_controller_index()
{
    require_once(MODEL_DIR . "/forum.php");
    $forum = forum_select();
    render('forum/index.php', $forum);
}
//** fonction qui va afficher la page de création d'une publication. */
function forum_controller_create($id)
{
    $id_utilisateur = $_GET['id'] ?? null;

    if (!$id_utilisateur) {
        echo "ID utilisateur manquant.";
        exit;
    }

    // On passe l'ID utilisateur à la vue dans un tableau associatif

    return render("forum/create.php", ['id_utilisateur' => $id]);
}

//** fonction qui va traiter la requet de l'utilisateur et va l'inserer dans la base de donnée
// et va lui afficher la page de l'utilisateur avec les publications qu'il a fait. */
function forum_controller_store($request)
{
    require(MODEL_DIR . "/forum.php");
    // on procéde à l'insertion dans la base de donnée et le retour est l'id de l'utilisateur
    $forum_id_utilisateur = forum_insert($request);
    // on vérifie si l'insertion s'est bien passé ou pas
    if (!$forum_id_utilisateur) {
        echo "Erreur lors de l'insertion dans la base de données.";
        exit;
    } else {
        $data = ['id' => $forum_id_utilisateur];
        // on va selectionner l'utilisateur et lui montrer ses publications:
        header("location:?controller=user&function=show&id=" . $forum_id_utilisateur);
    }
}
function forum_controller_edit($request)
{
    $id = $request['id'];
    require_once(MODEL_DIR . "/forum.php");
    $forum = forum_edit($id);
    if ($forum) {
        return render('forum/edit.php', $forum);
    } else {
        echo "publication introuvable.";
    }
}

//** fonction qui va traiter la requet de l'utilisateur et va modifier la publication dans la base de donnée
// et va lui afficher la page de l'utilisateur avec les publications qu'il a fait. */
function forum_controller_update($request)
{
    ob_start();

    require(MODEL_DIR . "/forum.php");
    require(CONNEX_DIR);
    foreach ($request as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $forumUpdate = forum_update($request);
    if ($forumUpdate) {
        // on va selectionner l'utilisateur et lui montrer ses publications:
        header("location:?controller=user&function=show&id=" . $id_utilisateur);
        exit;
    } else {
        echo "erreur, votre publication n'a pas été modifié.";
    }
    ob_end_flush();

}

//** fonction qui va traiter la requet de l'utilisateur et va supprimer la publication dans la base de donnée
// et va lui afficher la page de l'utilisateur avec les publications qu'il a fait. */
function forum_controller_delete($request)
{
    ob_start();
    require(MODEL_DIR . "/forum.php");
    $forumdelete = forum_delete($request['id']);
    $id = $request['id_utilisateur'];
    if ($forumdelete) {
        // on va selectionner l'utilisateur et lui montrer ses publications:

        header('location:?controller=user&function=show&id=' . $id);
        exit;
    } else {
        echo "erreur, votre publication n'a pas été supprimé.";
    }
    ob_end_flush();

}

