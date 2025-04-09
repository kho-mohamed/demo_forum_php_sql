<?php
$connex = mysqli_connect("localhost", "root", "admin", "forum_CMV", 3306);
if (mysqli_connect_errno()) {
    echo 'Erreur de connexion à la base de données : ' . mysqli_connect_error();
    exit();
}
mysqli_set_charset($connex, "utf8");
?>