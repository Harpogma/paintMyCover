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
    <title>Admin Dashboard</title> <!--TODO add admin dashboard to translate files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <?php require_once __DIR__ . "/../src/includes/header.php"; ?>
    
    <main class="container">
        <h1>This is your AdminDashbord</h1>
        <p>Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?> (Admin)</p>
        
        <div class="grid">
            <article>
                <h2>Gérer les Covers</h2>
                <p>Ajouter, modifier ou supprimer des covers</p>
                <a href="<?php echo url('admin/manageCovers'); ?>" role="button">Gérer les Covers</a>
            </article>
            
            <article>
                <h2>Gérer les Utilisateurs</h2>
                <p>Voir les utilisateurs et modifier leurs rôles</p>
                <a href="<?php echo url('admin/manageUsers'); ?>" role="button">Gérer les Utilisateurs</a>
            </article>
        </div>
    </main>
    
    <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>
</body>
</html>
