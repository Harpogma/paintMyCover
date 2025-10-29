<?php
// Inclusion de l'utilitaire de chargement des traductions
require_once __DIR__ . '/../src/i18n/load-translation.php';
require_once __DIR__ . '/../src/config/config.php';

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



?>
<!-- cette page permet de visualiser, supprimer, redirige aux pages -->
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

    <title><?= htmlspecialchars($traductions['title']) ?></title>
</head>

<body>
    <?php require_once __DIR__ . "/../src/includes/header.php"; ?>

    <div>
    <form method="post" action="index.php">
        <label for="language"><?= htmlspecialchars($traductions['choose_language']) ?></label>
        <select name="language" id="language">
            <option value="fr" <?= $lang === 'fr' ? ' selected' : '' ?>><?= htmlspecialchars($traductions['languages']['fr']) ?></option>
            <option value="en" <?= $lang === 'en' ? ' selected' : '' ?>><?= htmlspecialchars($traductions['languages']['en']) ?></option>
        </select>
        <button type="submit"><?= htmlspecialchars($traductions['submit']) ?></button>
    </form>
</div>

    <main class="container">
        <h1><?= htmlspecialchars($traductions['title']) ?></h1>

        <p><?= htmlspecialchars($traductions['accueil']) ?></p>


        <h2>Covers</h2>
<!-- rajouter img, titre album, nom artiste-->
    </main>

    <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>

</html>