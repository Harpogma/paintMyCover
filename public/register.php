<?php
require_once __DIR__ . '/../src/config/config.php';
require_once '../src/includes/auth.php';

if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    $result = authenticateUser($_POST['username'], $_POST['password']);
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <title>Création de compte</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <?php require_once __DIR__ . "/../src/includes/header.php"; ?>

    <div class="container">

        <form action="register.php" method="post">
            <h1>Connexion</h1>
            <div>
                <label for="username">Nom</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="password2">Confirmez le mot de passe</label>
                <input type="password" name="password2" id="password2">
            </div>
            <button type="submit">Créer un compte</button>
            <footer>Déjà membre ? <a href="<?php echo url('login'); ?>">Se connecter</a></footer>
        </form>
    </div>

    <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>

</html>