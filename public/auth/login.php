<?php
session_start();

require_once __DIR__ . '/../../src/config/config.php';
require_once __DIR__ . '/../../src/i18n/load-translation.php';
require_once __DIR__ . '/../../src/utils/autoloader.php';
global $traductions;
global $lang;

if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: adminDashboard.php");
        exit();
    } else {
        header("Location: dashboard.php");
        exit();
    }
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = 'Tous les champs sont obligatoires.';
    } else {
        try {
            // Connexion à la base de données
            $db = new Database();
            $pdo = $db->getPdo();

            $stmt = $pdo->prepare('SELECT * FROM user WHERE username = :username');
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();


            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                if($_SESSION['role'] === 'admin') {
                    header('Location: ../adminDashboard.php');
                    exit();
                } elseif($_SESSION['role'] === 'user') {
                    header('Location: ../dashboard.php');
                    exit();
                }
            } else {
                $error = 'E-mail ou mot de passe incorrect.';
            }
        } catch (PDOException $e) {
            $error = 'Erreur lors de la connexion : ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <title><?= htmlspecialchars($traductions['connexion']) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
<?php require_once __DIR__ . "/../../src/includes/header.php"; ?>

    <h2><?= htmlspecialchars($traductions['connexion']) ?></h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <?php if(isset($success)) echo "<p style='color:green;'>$success</p>"; ?>

    <form method="POST">
        <label for="username">
            <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required>
        </label>
        <label for="password"   >
            <input type="password" id="password" name="password" placeholder="Mot de passe" required>
        </label>
        <button type="submit"><?= htmlspecialchars($traductions['connexion']) ?></button>
    </form>

    <p>Vous n'avez pas encore de compte ? <a href="<?php echo url('auth/register'); ?>"><?= htmlspecialchars($traductions['compte']) ?></a></p>
    <?php require_once __DIR__ . "/../../src/includes/footer.php"; ?>

</body>
</html>