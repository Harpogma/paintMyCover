<?php
// Inclusion de l'utilitaire de chargement des traductions
require_once __DIR__ . '/../src/i18n/load-translation.php';
require_once __DIR__ . '/../src/config/config.php';
?>


<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <title>Login / Inscription</title>
</head>
<body>
    <h2><?= htmlspecialchars($traductions['connexion']) ?></h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <?php if(isset($success)) echo "<p style='color:green;'>$success</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required><br><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br><br>
        <button type="submit" name="login"><?= htmlspecialchars($traductions['connexion']) ?></button>
        <button type="submit" name="register"><?= htmlspecialchars($traductions['compte']) ?></button>
    </form>
</body>
</html>