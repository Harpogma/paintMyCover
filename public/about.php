<?php
require_once __DIR__ . '/../src/i18n/load-translation.php';
require_once __DIR__ . '/../src/utils/autoloader.php';
require_once __DIR__ . '/../src/utils/cookie-manager.php';
require_once __DIR__ . '/../src/config/config.php';
?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
    <title><?= htmlspecialchars($traductions['proposTitre']) ?></title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

    <title><?= htmlspecialchars($traductions['titre']) ?></title>
</head>
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
            <h2><?= htmlspecialchars($traductions['equipe']) ?></h2>
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