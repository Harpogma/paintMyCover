<?php

// Inclusion de l'utilitaire de chargement des traductions
require_once __DIR__ . '/../src/utils/autoloader.php';
require_once __DIR__ . '/../src/utils/cookie-manager.php';
require_once __DIR__ . '/../src/i18n/load-translation.php';
require_once __DIR__ . '/../src/config/config.php';

// Récupérer la langue du cookie ou utiliser la langue par défaut
$lang = CookieManager::getLanguage() ?? DEFAULT_LANG;
$traductions = loadTranslation($lang);

// Changer langue préférée
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['language'])) {
    $lang = $_POST['language'] ?? DEFAULT_LANG;
    CookieManager::setLanguage($lang);
    header('Location: index.php');
    exit;
}

use Cover\CoversManager;
use Cover\Cover;

$coversManager = new CoversManager();
$covers = $coversManager->getCovers();

?>


<!-- cette page permet de visualiser, supprimer, redirige aux pages -->
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="<?php echo url('assets/css/custom.css'); ?>">
    <title><?= htmlspecialchars($traductions['titre']) ?></title>
</head>

<body>
    <?php require_once __DIR__ . "/../src/includes/header.php"; ?>
    <?php require_once __DIR__ . '/../src/includes/cookie-banner.php'; ?>

    <div>
        <form method="post" action="index.php">
            <label for="language"><?= htmlspecialchars($traductions['choisir_langue']) ?></label>
            <select name="language" id="language">
                <option value="fr" <?= $lang === 'fr' ? ' selected' : '' ?>><?= htmlspecialchars($traductions['languages']['fr']) ?></option>
                <option value="en" <?= $lang === 'en' ? ' selected' : '' ?>><?= htmlspecialchars($traductions['languages']['en']) ?></option>
            </select>
            <button type="submit"><?= htmlspecialchars($traductions['envoyer']) ?></button>
        </form>
    </div>

    <main class="container">
        <h1><?= htmlspecialchars($traductions['titre']) ?></h1>

        <p><?= htmlspecialchars($traductions['accueilTitre']) ?></p>


        <h2>Covers</h2>
        <div class="covers-grid">
        <?php foreach ($covers as $cover) : ?>
            <div class="cover-card">
                <img src="img/<?= htmlspecialchars($cover->getImagePath()) ?>" alt="Cover image">
                <h4><?= htmlspecialchars($cover->getAlbumName()) ?></h4>
                <p><?= htmlspecialchars($cover->getArtistName()) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
        </main>


    <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>

</html>