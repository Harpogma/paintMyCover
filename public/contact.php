<?php

require_once __DIR__ . '/../src/config/config.php';


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="color-scheme" content="light dark">
  <link rel="stylesheet" href="css/custom.css">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

  <title>Page d'accueil | PaintMyCover</title>
</head>

<body>

  <?php require_once __DIR__ . "/../src/includes/header.php"; ?>

  <form class="container">
    <fieldset>
      <label>
        Prénom
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
      value="Envoyer" />
  </form>
  <?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>

</html>