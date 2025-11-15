<?php
session_start();
require_once __DIR__ . '/../src/config/config.php';
require_once __DIR__ . '/../src/i18n/load-translation.php';
require_once __DIR__ . '/../src/utils/autoloader.php';
require_once __DIR__ . '/../src/config/require_login.php';
global $traductions;
global $lang;
var_dump($_SESSION);
?>


<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <title>Dashboard</title> <!--TODO add dashboard to translate files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
<?php require_once __DIR__ . "/../src/includes/header.php"; ?>


<!--TODO add dashboard to translate files -->

<h1>this is your dashboard</h1>

<?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>
</html>