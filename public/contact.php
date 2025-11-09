<?php 
require_once __DIR__ . '/../src/i18n/load-translation.php';
require_once __DIR__ . '/../src/config/config.php';
require_once __DIR__ . '/../src/utils/cookie-manager.php';


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

  <title><?= htmlspecialchars($traductions['title']) ?></title>
</head>
<?php require_once __DIR__ . '/../src/includes/cookie-banner.php'; ?>
<body>

  <?php require_once __DIR__ . "/../src/includes/header.php"; ?>

  <form class="container">
    <fieldset>
      <label>
        <?= htmlspecialchars($traductions['nom']) ?>
        <input
          name="first_name"
          placeholder="Prénom"
          autocomplete="given-name"
          required />
      </label>
      <label>
        Email
        <input
          type="email"
          name="email"
          placeholder="Email"
          autocomplete="email"
          required />
      </label>
      <label for="message">
        Message
        <textarea id="message" name="message" placeholder="Votre message..." required></textarea>
      </label>
    </fieldset>


    <input
      type="submit"
      value="<?= htmlspecialchars($traductions['envoyer']) ?>" />
  </form>
  <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>

</html>