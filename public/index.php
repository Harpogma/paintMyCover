<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Inclusion de l'utilitaire de chargement des traductions
require_once __DIR__ . '/../src/utils/cookie-manager.php';
require_once __DIR__ . '/../src/i18n/load-translation.php';
require_once __DIR__ . '/../src/config/config.php';

const DEFAULT_LANG = 'fr';

// Récupérer la langue du cookie ou utiliser la langue par défaut
$lang = CookieManager::getLanguage() ?? DEFAULT_LANG;
$traductions = loadTranslation($lang);

// Changer langue préférée
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lang = $_POST['language'] ?? DEFAULT_LANG;
    CookieManager::setLanguage($lang);
    header('Location: index.php');
    exit;
}

$baseImg = "img/";
$albums = [
    ["title" => "album 1", "artist" => "artist 1", "img" => $baseImg . "phpBadBunny.jpg"],
    ["title" => "album 2", "artist" => "artist 2", "img" => $baseImg . "phpCarti.jpg"],
    ["title" => "album 3", "artist" => "artist 3", "img" => $baseImg . "phpDj.jpg"],
    ["title" => "album 4", "artist" => "artist 4", "img" => $baseImg . "phphugotsr.jpg"],
    ["title" => "album 5", "artist" => "artist 5", "img" => $baseImg . "phpKhali.jpg"],
    ["title" => "album 6", "artist" => "artist 6", "img" => $baseImg . "phpLuv.jpg"],
    ["title" => "album 7", "artist" => "artist 7", "img" => $baseImg . "phpMoji.jpg"],
    ["title" => "album 8", "artist" => "artist 8", "img" => $baseImg . "phpNes.jpg"],
    ["title" => "album 9", "artist" => "artist 9", "img" => $baseImg . "phpRuss.jpg"],
    ["title" => "album 10", "artist" => "artist 10", "img" => $baseImg . "phpUMLA.jpg"]
];
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
<?php require_once __DIR__ . '/../src/includes/cookie-banner.php'; ?>
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

        <p><?= htmlspecialchars($traductions['accueilTitre']) ?></p>


        <h2>Covers</h2>
        <main class="container">
            <?php
            foreach ($albums as $album) {
                echo '
                <article class="album-card">
                <figure>
                    <img src="' . htmlspecialchars($album['img']) . '" alt="' . htmlspecialchars($album['title']) . '">
                    <figcaption>
                    <p class="album-title">' . htmlspecialchars($album['title']) . '</p>
                    <p class="artist-name">' . htmlspecialchars($album['artist']) . '</p>
                    </figcaption>
                </figure>
                </article>';
            }
            ?>
        </main>

        <p><a href="../public/cover/index.php"><button><?= htmlspecialchars($traductions['outils']) ?></button></a></p>

    </main>

    <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>

</html>