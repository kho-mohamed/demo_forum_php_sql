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
            <li><a href="?controller=user&function=login"><?php if (isset($_SESSION)) {
                echo "Se connecter";
            } ?></a></li>
            <li><a href="?controller=user&function=create"><?php if (!isset($_SESSION)) {
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