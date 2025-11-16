<?php
require __DIR__ . '/../../src/utils/autoloader.php';

use Cover\CoversManager;
use Cover\Cover;

// Création d'une instance de CoversManager
$coversManager = new CoversManager();

// Récupération de tous les outils
$covers = $coversManager->getCovers();
?>

<!DOCTYPE html>
<html lang="fr">

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

<body>
    <?php require_once __DIR__ . "/../src/includes/header.php"; ?>

    <main class="container">
        <h1>Gestion des covers</h1>

        <p><a href="../index.php">Accueil</a> > Gestion des covers</p>

        <h2>Liste des covers</h2>

        <p><a href="create.php"><button>Créer une nouvelle cover</button></a></p>

        <table>
            <thead>
                <tr>
                    <th>Nom de l'album</th>
                    <th>Nom de l'artiste</th>
                    <th>Taille de la cover</th>
                    <th>Chemin de l'image</th>
                    <th>Fourchette de prix</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($covers as $cover) { ?>
                    <tr>
                        <td><?= htmlspecialchars($cover->getId()) ?></td>
                        <td><?= htmlspecialchars($cover->getAlbumName()) ?></td>
                        <td><?= htmlspecialchars($cover->getArtistName()) ?></td>
                        <td><?= htmlspecialchars($cover->getAlbumName()) ?></td>
                        <td><?= htmlspecialchars($cover->getImagePath()) ?></td>
                        <td><?= htmlspecialchars($tool->getPriceRange()) ?></td>
                        <td>
                            <a href="delete.php?id=<?= htmlspecialchars($cover->getId()) ?>"><button>Supprimer</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

    <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>

</html>