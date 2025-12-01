<?php
session_start();
require_once __DIR__ . '/../../src/config/config.php';
require_once __DIR__ . '/../../src/i18n/load-translation.php';
require_once __DIR__ . '/../../src/utils/autoloader.php';
require_once __DIR__ . '/../../src/config/require_login.php';
require_login('admin');

use Cover\CoversManager;
use Cover\Cover;

$coversManager = new CoversManager();
$message = '';
$error = '';

// Traiter la suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_cover'])) {
    $coverId = (int)$_POST['cover_id'];
    try {
        if ($coversManager->removeCover($coverId)) {
            $message = "Cover supprimé avec succès.";
        }
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
    }
}

$covers = $coversManager->getCovers();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <title>Gestion des Covers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <?php require_once __DIR__ . "/../../src/includes/header.php"; ?>
    
    <main class="container">
        <h1><?= htmlspecialchars($traductions['gestionCovers']) ?></h1>
        <p><a href="<?php echo url('adminDashboard'); ?>">← <?= htmlspecialchars($traductions['retour_tableauBord']) ?></a></p>
        
        <?php if ($message): ?>
            <article style="background-color: #d4edda; color: #155724; padding: 1rem;">
                <?= htmlspecialchars($message) ?>
            </article>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <article style="background-color: #f8d7da; color: #721c24; padding: 1rem;">
                <?= htmlspecialchars($error) ?>
            </article>
        <?php endif; ?>
        
        <p><a href="<?php echo url('cover/create'); ?>" role="button">+ <?= htmlspecialchars($traductions['ajouter_cover']) ?></a></p>
        
        <h2><?= htmlspecialchars($traductions['liste_covers']) ?></h2>
        
        <?php if (empty($covers)): ?>
            <p><?= htmlspecialchars($traductions['pas_cover']) ?></p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Album</th>
                        <th><?= htmlspecialchars($traductions['artiste']) ?></th>
                        <th><?= htmlspecialchars($traductions['taille']) ?></th>
                        <th><?= htmlspecialchars($traductions['prix']) ?></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($covers as $cover): ?>
                        <tr>
                            <td><?= htmlspecialchars($cover->getId()) ?></td>
                            <td><?= htmlspecialchars($cover->getAlbumName()) ?></td>
                            <td><?= htmlspecialchars($cover->getArtistName()) ?></td>
                            <td><?= htmlspecialchars($cover->getCanvaSize()) ?></td>
                            <td><?= htmlspecialchars($cover->getPriceRange()) ?></td>
                            <td>
                                <form method="post" style="display: inline;" 
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce cover ?');">
                                    <input type="hidden" name="cover_id" value="<?= $cover->getId() ?>">
                                    <button type="submit" name="delete_cover" class="secondary"><?= htmlspecialchars($traductions['supprimer']) ?></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
    
    <?php require_once __DIR__ . "/../../src/includes/footer.php"; ?>
</body>
</html>