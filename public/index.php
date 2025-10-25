<?php

require_once __DIR__ . '/../src/config/config.php';

?>
<!-- cette page permet de visualiser, supprimer, redirige aux pages -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

    <title>Page d'accueil | PaintMyCover</title>
</head>

<body>

    <?php require_once __DIR__ . "/../src/includes/header.php"; ?>

    <main class="container">
        <h1>Page d'accueil</h1>

        <p>Bienvenue sur la page d'accueil de PaintMyCover.</p>


        <p><a href="tools/index.php"><button>Aller à la gestion des commandes</button></a></p>
    </main>

    <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>

</html>