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
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <title>Dashboard</title> <!--TODO add dashboard to translate files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
<?php require_once __DIR__ . "/../src/includes/header.php"; ?>


<!--TODO add dashboard to translate files -->

<main class="container">
        <h1>this is your dashoboard/h1>
        <p>Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?></p>
        
        <h2>Toutes les Covers Disponibles</h2>
        
        <?php if (empty($covers)): ?>
            <p>Aucun cover disponible pour le moment.</p>
        <?php else: ?>
            <div class="grid">
                <?php foreach ($covers as $cover): ?>
                    <article>
                        <img src="../img/<?= htmlspecialchars($cover->getImagePath()) ?>" 
                             alt="<?= htmlspecialchars($cover->getAlbumName()) ?>" 
                             style="width: 100%; height: auto;">
                        <h3><?= htmlspecialchars($cover->getAlbumName()) ?></h3>
                        <p><strong>Artiste:</strong> <?= htmlspecialchars($cover->getArtistName()) ?></p>
                        <p><strong>Taille:</strong> <?= htmlspecialchars($cover->getCanvaSize()) ?></p>
                        <p><strong>Prix:</strong> <?= htmlspecialchars($cover->getPriceRange()) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

<?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>
</html>