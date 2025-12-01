<?php
session_start();
require_once __DIR__ . '/../src/config/config.php';
require_once __DIR__ . '/../src/i18n/load-translation.php';
require_once __DIR__ . '/../src/utils/autoloader.php';
require_once __DIR__ . '/../src/config/require_login.php';

require_login('user');

use Cover\CoversManager;

$coversManager = new CoversManager();
$covers = $coversManager->getCovers();


global $traductions;
global $lang;

?>


<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($traductions['tableau_bordTitreUser']) ?></title> <!--TODO add dashboard to translate files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="<?php echo url('assets/css/custom.css'); ?>">
</head>

<body>
<?php require_once __DIR__ . "/../src/includes/header.php"; ?>


<!--TODO add dashboard to translate files -->

<main class="container">
        <h1><?= htmlspecialchars($traductions['tableau_bordUser']) ?></h1>
        <p><?= htmlspecialchars($traductions['bienvenue']) ?> <?= htmlspecialchars($_SESSION['username']) ?></p>
        
        <h2><?= htmlspecialchars($traductions['cover_dispo']) ?></h2>
        
        <?php if (empty($covers)): ?>
            <p><?= htmlspecialchars($traductions['pas_cover']) ?></p>
        <?php else: ?>
        <div class="covers-grid">
            <?php foreach ($covers as $cover): ?>
                <div class="cover-card">
                    <img src="../img/<?= htmlspecialchars($cover->getImagePath()) ?>" 
                         alt="<?= htmlspecialchars($cover->getAlbumName()) ?>">
                    <h4><?= htmlspecialchars($cover->getAlbumName()) ?></h4>
                    <p><?= htmlspecialchars($cover->getArtistName()) ?></p>
                    <p class="cover-details">
                        <small>
                            <strong><?= htmlspecialchars($traductions['taille']) ?>:</strong> <?= htmlspecialchars($cover->getCanvaSize()) ?><br>
                            <strong><?= htmlspecialchars($traductions['prix']) ?>:</strong> <?= htmlspecialchars($cover->getPriceRange()) ?>
                        </small>
                    </p>
                </div>
            <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

<?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>
</html>