<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORUM COLLÉGE MAISSONEUVE</title>
    <link rel="stylesheet" href="resources/css/style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="?controller=forum&function=index">Voir tous les publications du forum</a></li>
            <li><a href="?controller=user&function=show&id=<?php if (isset($_SESSION['id'])) {
                echo $_SESSION['id'];
            } ?>"><?php if (isset($_SESSION['id'])) {
                 echo "Voir mes publications";
             } ?></a></li>
        </ul>
        <ul>
            <li><a href="?controller=user&function=create"><?php if (!isset($_SESSION['id'])) {
                echo "créer un compte";
            } ?></a></li>
            <li><a href="?controller=user&function=logout"><?php if (isset($_SESSION['id'])) {
                echo "Se déconnecter";
            } ?></a></li>

            <li><a href="?controller=user&function=login"><?php if (!isset($_SESSION['id'])) {
                echo "Se connecter";
            } ?></a></li>
        </ul>
    </nav>
    <main>
        <?php echo $content; ?>
    </main>
    <footer>
        Copyright 2024 - COLLÉGE MAISSONEUVE - MONTRÉAL
    </footer>
</body>

</html>