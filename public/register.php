<?php
require_once __DIR__ . '/../src/config/config.php';
require_once '../src/includes/auth.php';
require_once __DIR__ . '/../src/i18n/load-translation.php';

if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    $result = authenticateUser($_POST['username'], $_POST['password']);
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <title><?= htmlspecialchars($traductions['compte']) ?></title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <?php require_once __DIR__ . "/../src/includes/header.php"; ?>

    <div class="container">

        <form action="register.php" method="post">
            <h1><?= htmlspecialchars($traductions['connexion']) ?></h1>
            <div>
                <label for="username"><?= htmlspecialchars($traductions['nom']) ?></label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password"><?= htmlspecialchars($traductions['mdp']) ?></label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="password2"><?= htmlspecialchars($traductions['confirmer_mdp']) ?></label>
                <input type="password" name="password2" id="password2">
            </div>
            <button type="submit"><?= htmlspecialchars($traductions['compte']) ?></button>
            <footer><?= htmlspecialchars($traductions['membre']) ?><a href="<?php echo url('login'); ?>"><?= htmlspecialchars($traductions['connexion']) ?></a></footer>
        </form>
    </div>

    <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>

</html>