<?php

session_start();

require_once __DIR__ . '/../src/config/config.php';
require_once __DIR__ . '/../src/i18n/load-translation.php';
require_once __DIR__ . '/../src/utils/autoloader.php';
require_once __DIR__ . '/../src/config/require_login.php';


require_login('admin');

global $traductions;
global $lang;


?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <title><?= htmlspecialchars($traductions['tableau_bordTitre']) ?></title> <!--TODO add admin dashboard to translate files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <?php require_once __DIR__ . "/../src/includes/header.php"; ?>
    
    <main class="container">
        <h1><?= htmlspecialchars($traductions['tableau_bord']) ?></h1>
        <p><?= htmlspecialchars($traductions['bienvenue']) ?> <?= htmlspecialchars($_SESSION['username']) ?> (Admin)</p>
        
        <div class="grid">
            <article>
                <h2><?= htmlspecialchars($traductions['gererCovers']) ?></h2>
                <p><?= htmlspecialchars($traductions['gererCovers_descr']) ?></p>
                <a href="<?php echo url('admin/manageCovers'); ?>" role="button"><?= htmlspecialchars($traductions['gererCovers']) ?></a>
            </article>
            
            <article>
                <h2><?= htmlspecialchars($traductions['gererUtilisateurs']) ?></h2>
                <p><?= htmlspecialchars($traductions['gererUtilisateurs_descr']) ?></p>
                <a href="<?php echo url('admin/manageUsers'); ?>" role="button"><?= htmlspecialchars($traductions['gererUtilisateurs']) ?></a>
            </article>
        </div>
    </main>
    
    <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>
</body>
</html>
