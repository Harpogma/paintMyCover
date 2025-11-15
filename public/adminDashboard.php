<?php
require_once __DIR__ . '/../src/config/config.php';
require_once __DIR__ . '/../src/i18n/load-translation.php';
require_once __DIR__ . '/../src/utils/autoloader.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    http_response_code(403);
    echo "Access denied";
    exit();
}

global $traductions;
global $lang;

?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <title>Admin Dashboard</title> <!--TODO add admin dashboard to translate files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
<?php require_once __DIR__ . "/../src/includes/header.php"; ?>


<!--TODO add admin dashboard to translate files -->

<h1>this is your admin dashboard</h1>

<?php require_once __DIR__ . "/../src/includes/footer.php"; ?>

</body>
</html>
