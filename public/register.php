<?php
require_once '../src/includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = authenticateUser($_POST['username'], $_POST['password']);
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création de compte</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    >
</head>
<body>
    <?php require_once __DIR__ . "/../src/includes/header.php"; ?>

    <div class="container">
        <h2>Connexion</h2>
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <?php if(isset($success)) echo "<p style='color:green;'>$success</p>"; ?>

        <form action="../src/includes/auth.php" method="POST">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" name="login">Se connecter</button>
            <button type="submit" name="register">Créer un compte</button>
        </form>
    </div>
   
    <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>
</html>