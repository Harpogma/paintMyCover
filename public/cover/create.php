<?php

session_start();
require_once __DIR__ . '/../../src/utils/autoloader.php';
require_once __DIR__ . '/../../src/config/config.php';
require_once __DIR__ . '/../../src/i18n/load-translation.php';
require_once __DIR__ . '/../../src/config/require_login.php';

require_login('admin');

global $traductions;
global $lang;

use Cover\CoversManager;
use Cover\Cover;

$coversManager = new CoversManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $albumName = $_POST['albumName'] ?? '';
    $artistName = $_POST['artistName'] ?? '';
    $canvaSize = $_POST['canvaSize'] ?? '';
    $imagePath = $_POST['imagePath'] ?? '';
    $priceRange = $_POST['priceRange'] ?? '';
    $user_id = $_SESSION['user_id'] ?? null;

    $errors = [];

    try {
        $cover = new Cover(
            null,
            $albumName,
            $artistName,
            $canvaSize,
            $imagePath,
            $priceRange
        );
    } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
    }

    if (empty($errors)) {
        try {
            $coverId = $coversManager->addCover($cover);
            $coversManager->assignCoverToUser($coverId, $user_id);

            header('Location: /adminDashboard.php?success=1');
            exit();
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $errors[] = "Une cover avec ce nom existe déjà.";
            } else {
                $errors[] = "Erreur SQL: " . $e->getMessage();
            }
        } catch (Exception $e) {
            $errors[] = "Erreur inattendue : " . $e->getMessage();
        }
    }

    // ❗❗ If we reach here, DO NOT redirect blindly
    // Display errors so you can see what’s wrong
    echo "<pre>";
    print_r($errors);
    echo "</pre>";
    exit();
}
?>

<h2>Add a cover</h2>

<?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
    <?php if (empty($errors)) { ?>
        <p style="color: green;">La cover a été ajoutée avec succès !</p>
    <?php } else { ?>
        <p style="color: red;">Le formulaire contient des erreurs :</p>
        <ul>
            <?php foreach ($errors as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
<?php } ?>

<form action="cover/create.php" method="post">
    <label for="albumName">Album name
        <input type="text" id="albumName" name="albumName">
    </label>
    <label for="artistName">Artist name
        <input type="text" id="artistName" name="artistName">
    </label>
    <label for="canvaSize">Canva size
        <input type="text" id="canvaSize" name="canvaSize">
    </label>
    <label for="imagePath">Image path
        <input type="text" id="imagePath" name="imagePath">
    </label>
    <label for="priceRange">Price range
        <input type="text" id="priceRange" name="priceRange">
    </label>
    <button type="submit">Add cover</button>
</form>

