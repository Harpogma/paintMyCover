<?php

require_once __DIR__ . '/../src/config/config.php';


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

    <title><?= htmlspecialchars($traductions['title']) ?></title>
</head>

<body>
    <?php require_once __DIR__ . "/../src/includes/header.php"; ?>

 
  <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>

</html>