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

function user_controller_show($data)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    require(MODEL_DIR . "/user.php");
    require(MODEL_DIR . "/forum.php");
    $id = $data["id"];
    $user = user_select_id($id);
    if ($user) {
        $forum = forum_select_id($id);
        if ($forum) {
            $user = ['user' => $user];
            $forum = ['forum' => $forum];
            $data = array_merge($user, $forum);
            return render("user/show.php", $data);
        } else {
            echo "Vous avez rien publier sur le forum, revenez en arrière pour publier un article";
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
    if (!isset($_SESSION)) {
        session_start();
    }
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        render('user/login.php');
        exit;
    }
    require(MODEL_DIR . '/user.php');
    require(MODEL_DIR . "/forum.php");
    $userId = user_auth($request);
    if ($userId) {
        return header("location:?controller=user&function=show&id=" . $userId);
    } else {
        $msg = 1;
        render('user/login.php', $msg = 1);

    }
}


function user_controller_logout()
{
    require(MODEL_DIR . '/user.php');
    user_logout();
    // on va rediriger l'utilisateur vers la page de connexion
    header("location:?controller=forum&function=index");
    exit;

}
