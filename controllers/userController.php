<?php

function user_controller_create()
{
    return render("user/create.php");
}
function user_controller_store($request)
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        render('user/login.php');
        exit;
    }
    require(MODEL_DIR . "/user.php");
    $user = user_insert($request);
    header("location:?controller=user&function=show&id=" . $user);
}

function user_controller_show($request)
{
    $id = $request["id"];
    require(MODEL_DIR . "/user.php");
    require(MODEL_DIR . "/forum.php");

    $user = user_select_id($id);
    if ($user) {
        $forum = forum_select_id($id);
        if ($forum) {
            return render("user/show.php", $forum);
        } else {
            echo "Vous avez rien publier sur le forum";
        }
    } else {
        echo 'Utilisateur introuvable';
    }
}

// function qui va afficher la page de connexion
function user_controller_login()
{
    render('user/login.php');
}


// function qui reçoit la requet en paramettre et qui va
// vérifier si l'utilisateur existe dans la base de donnée et soit il lui affiche la page secrête soit il lui affiche un message d'erreur
// et le redirige vers la page de connexion.
function user_controller_auth($request)
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        render('user/login.php');
        exit;
    }
    require(MODEL_DIR . '/user.php');
    require(MODEL_DIR . "/forum.php");
    $userId = user_auth($request);
    if ($userId) {
        $forum = forum_select_id($userId);
        return render("user/show.php", $forum);
    } else {
        $msg = 1;
        render('user/login.php', $msg = 1);

    }
}
