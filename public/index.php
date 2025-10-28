<?php
// Inclusion de l'utilitaire de chargement des traductions
require_once __DIR__ . '/../src/i18n/load-translation.php';

const COOKIE_NAME = 'lang';
const COOKIE_LIFETIME = (30 * 24 * 60 * 60);
const DEFAULT_LANG = 'fr';

$lang = $_COOKIE[COOKIE_NAME] ?? DEFAULT_LANG;

$traductions = loadTranslation($lang);

// changer langue préférée
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lang = $_POST['language'] ?? DEFAULT_LANG;

    setcookie(COOKIE_NAME, $lang, time() + COOKIE_LIFETIME);
    header('Location: index.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="css/custom.css">

    <title><?= htmlspecialchars($traductions['title']) ?></title>
    <title>Page d'accueil | PaintMyCover</title>
</head>

<body>
    <main class="container">
        <h1>Page d'accueil</h1>

        <p>Bienvenue sur la page d'accueil de PaintMyCover.</p>


        <p><a href="tools/index.php"><button>Aller à la gestion des commandes</button></a></p>
    </main>
</body>

</html>