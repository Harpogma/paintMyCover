<?php 
require_once __DIR__ . '/../src/i18n/load-translation.php';
require_once __DIR__ . '/../src/config/config.php';
require_once __DIR__ . '/../src/utils/cookie-manager.php';

$lang = CookieManager::getLanguage() ?? DEFAULT_LANG;
$traductions = loadTranslation($lang);

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="color-scheme" content="light dark">
  <link rel="stylesheet" href="css/custom.css">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

  <title><?= htmlspecialchars($traductions['titre']) ?></title>
</head>
<?php require_once __DIR__ . '/../src/includes/cookie-banner.php'; ?>
<body>

  <?php require_once __DIR__ . "/../src/includes/header.php"; ?>

  <container>
      <h2><?= htmlspecialchars($traductions['contact_nous']) ?></h2>
      <a href="mailto:contact@paintmycover.ch"><?= htmlspecialchars($traductions['envoyer_mail']) ?></a>
  </container>


  <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>

</html>