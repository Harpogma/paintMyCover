<?php
require_once __DIR__ . '/../src/i18n/load-translation.php';
require_once __DIR__ . '/../src/utils/autoloader.php';
require_once __DIR__ . '/../src/utils/cookie-manager.php';
?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($traductions['proposTitre']) ?></title>
    <link rel="stylesheet" href="assets/css/custom.css">
    </head>
<?php require_once __DIR__ . '/../src/includes/cookie-banner.php'; ?>
<body>
    <header>
        <nav>
            <a href="index.php"><?= htmlspecialchars($traductions['accueil']) ?></a> |
            <a href="about.php"><?= htmlspecialchars($traductions['propos']) ?></a> |
            <a href="login.php"><?= htmlspecialchars($traductions['connexion']) ?></a>
            </nav>
    </header>

    <main class="container mt-4">
        <h1><?= htmlspecialchars($traductions['proposTitre']) ?></h1>
        <hr>

        <section>
            <h2><?= htmlspecialchars($traductions['descriptionTitre']) ?></h2>
            <p><strong>PaintMyCover</strong> <?= htmlspecialchars($traductions['descriptionTitre']) ?></p>

        <section>
            <h2><?= htmlspecialchars($traductions['team']) ?></h2>
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