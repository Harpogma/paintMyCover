<?php

require_once '/../src/utils/autoloader.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>À Propos - PaintMyCover</title>
    <link rel="stylesheet" href="assets/css/custom.css">
    </head>
<body>
    <header>
        <nav>
            <a href="index.php">Accueil</a> |
            <a href="about.php">À Propos</a> |
            <a href="login.php">Connexion</a>
            </nav>
    </header>

    <main class="container mt-4">
        <h1>À Propos de PaintMyCover</h1>
        <hr>

        <section>
            <h2>Description du Projet</h2>
            <p><strong>PaintMyCover</strong> est un gestionnaire de commandes de tableaux d'albums.</p>

        <section>
            <h2>L'Équipe</h2>
            <ul>
                <li><strong>Léa Pires</strong></li>
                <li><strong>Grégory Daguerre</strong></li>
            </ul>
        </section>

    </main>

    <footer>
        <p class="text-center">&copy; <?= date('Y') ?> PaintMyCover</p>
    </footer>
</body>
</html>