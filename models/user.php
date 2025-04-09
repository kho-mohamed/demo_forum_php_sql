<?php

function user_insert($request)
{
    require(CONNEX_DIR);
    foreach ($request as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
    $sql = "INSERT INTO utilisateur (nom, nomUtilisateur, motDePasse, dateNaissance)  VALUES ('$name', '$username', '$password', '$birthday')";
    if (mysqli_query($connex, $sql)) {
        return mysqli_insert_id($connex);
    } else {
        return false;
    }
}

function user_select_id($id)
{
    require(CONNEX_DIR);
    $id = mysqli_real_escape_string($connex, $id);
    $sql = "SELECT * FROM utilisateur WHERE utilisateur.id = '$id'";
    $result = mysqli_query($connex, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $result;
    } else {
        return false;
    }
}

function user_auth($request)
{
    require(CONNEX_DIR);
    session_start();
    foreach ($request as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $sql = "SELECT * FROM utilisateur WHERE nomUtilisateur = '$username'";
    $result = mysqli_query($connex, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $passwordDb = $user['motDePasse'];
        if (password_verify($password, $passwordDb)) {
            // Session sécurisée
            session_regenerate_id();
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['nom'];
            $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
            return $user['id']; // Connexion réussie
        }
    }

    return false; // Échec
}

/// attente
function user_update($request)
{
    require(CONNEX_DIR);
    foreach ($request as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $sql = "UPDATE client SET name = '$name', address = '$address', phone = '$phone', email = '$email', birthday = '$birthday', city_id = '$city_id' WHERE id = '$id'";

    if (mysqli_query($connex, $sql)) {
        return true;
    } else {
        return false;
    }
}