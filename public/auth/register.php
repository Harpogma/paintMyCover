<?php
require_once __DIR__ . '/../../src/config/config.php';
require_once __DIR__ . '/../../src/i18n/load-translation.php';
require_once __DIR__ . '/../../src/utils/autoloader.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
const MAIL_CONFIGURATION_FILE = __DIR__ . '/../../src/config/mail.ini';

global $traductions;
global $lang;
session_start();

//const MAIL_CONFIGURATION_FILE = __DIR__ . '/../../src/config/mail.ini';
//$config = parse_ini_file(MAIL_CONFIGURATION_FILE);
//
//
//
//if (!$config) {
//    throw new Exception("Erreur lors de la lecture du fichier de configuration : " . MAIL_CONFIGURATION_FILE);
//}
//
//$host = $config['host'];
//$port = filter_var($config['port'], FILTER_VALIDATE_INT);
//$authentication = filter_var($config['authentication'], FILTER_VALIDATE_BOOLEAN);
//$username = $config['username'];
//$password = $config['password'];
//$from_email = $config['from_email'];
//$from_name = $config['from_name'];
//
//$mail = new PHPMailer(true);
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//
//try {
//    $mail->isSMTP();
//    $mail->Host = $host;
//    $mail->Port = $port;
//    $mail->SMTPAuth = $authentication;
//    $mail->Username = $username;
//    $mail->Password = $password;
//    $mail->CharSet = 'UTF-8';
//    $mail->Encoding = 'base64';
//
//    $mail->setFrom($from_email, $from_name);
//    $mail->addAddress('contact@paintmycover.ch', 'PaintMyCover');
//
//    $mail->isHTML(true);
//    $mail->Subject = 'subject test mail';
//    $mail->Body = 'body test mail';
//    $mail->AltBody = 'alt body test mail';
//
//    $mail->send();
//
//    echo('Mail has been sent');
//} catch (Exception $e) {
//    echo("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
//}





$errors = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    // Validation des données
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $errors = 'Tous les champs sont obligatoires.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = 'Veuillez entrer une adresse e-mail valide.';
    } elseif ($password !== $confirmPassword) {
        $errors = 'Les mots de passe ne correspondent pas.';
    } elseif (strlen($password) < 8) {
        $errors = 'Le mot de passe doit contenir au moins 8 caractères.';
    } else {
        try {
            // Connexion à la base de données
            $db = new Database();
            $pdo = $db->getPdo();

            // Vérifier si l'utilisateur existe déjà
            $stmt = $pdo->prepare('SELECT * FROM user WHERE username = :username');
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();

            if ($user) {
                $errors = 'Ce nom d\'utilisateur est déjà pris.';
            } else {
                // Hacher le mot de passe
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insérer le nouvel utilisateur
                $stmt = $pdo->prepare('INSERT INTO user (username, email, password, role) VALUES (:username, :email, :password, :role)');
                $stmt->execute([
                    'username' => $username,
                    'email' => $email,
                    'password' => $hashedPassword,
                    'role' => 'user' // Par défaut, les nouveaux utilisateurs ont le rôle "user"
                ]);

                $config = parse_ini_file(MAIL_CONFIGURATION_FILE);

                if (!$config) {
                    throw new Exception("Erreur lors de la lecture du fichier de configuration : " . MAIL_CONFIGURATION_FILE);
                }

                $host = $config['host'];
                $port = filter_var($config['port'], FILTER_VALIDATE_INT);
                $authentication = filter_var($config['authentication'], FILTER_VALIDATE_BOOLEAN);
                $usernameMail = $config['username'];
                $password = $config['password'];
                $from_email = $config['from_email'];
                $from_name = $config['from_name'];

                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = $host;
                    $mail->Port = $port;
                    $mail->SMTPAuth = $authentication;
                    $mail->Username = $usernameMail;
                    $mail->Password = $password;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // <--- required for port 465
                    $mail->CharSet = 'UTF-8';
                    $mail->Encoding = 'base64';

                    $mail->setFrom($from_email, $from_name);
                    $mail->addAddress($email, $username);

                    $mail->isHTML(true);
                    $mail->Subject = 'Bienvenue sur PaintMyCover';
                    $usernameSafe = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
                    $mail->Body = <<<HTML
                        <h1>Bonjour $usernameSafe!</h1>
                        <p>Bienvenue sur PaintMyCover :)</p>
                        <p>Clique <a href="http://paintmycover/public/auth/login">ici</a> pour te connecter !</p>
                        HTML;
                    $mail->AltBody = "Bonjour $usernameSafe!\nBienvenue sur PaintMyCover :)\nConnecte-toi ici: http://paintmycover/public/auth/login\nÀ bientôt !";

                    $mail->send();


                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                $success = 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.';
            }
        } catch (PDOException $e) {
            $errors = 'Erreur lors de la création du compte : ' . $e->getMessage();
        }
    }
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <title><?= htmlspecialchars($traductions['compte']) ?></title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
    <?php require_once __DIR__ . "/../../src/includes/header.php"; ?>

    <main class="container">
        <h1><?= htmlspecialchars($traductions['compte']) ?></h1>

        <?php if ($errors) { ?>
            <p><strong>Erreur :</strong> <?= htmlspecialchars($errors) ?></p>
        <?php } ?>

        <?php if ($success) { ?>
            <p><strong>Succès :</strong> <?= htmlspecialchars($success) ?></p>
            <p><a href="<?php echo url('auth/login'); ?>)">Se connecter maintenant</a></p>
        <?php } ?>

        <form method="post">
            <label for="username">
                <?= htmlspecialchars($traductions['nom_utilisateur']) ?>
                <input type="text" id="username" name="username" required autofocus>
            </label>

            <label for="email">
                Email
                <input type="email" id="email" name="email" required>
            </label>

            <label for="password">
                <?= htmlspecialchars($traductions['mdp_caractere']) ?>
                <input type="password" id="password" name="password" required minlength="8">
            </label>

            <label for="confirm_password">
                <?= htmlspecialchars($traductions['confirmer_mdp']) ?>
                <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
            </label>

            <button type="submit"><?= htmlspecialchars($traductions['compte_moi']) ?></button>
        </form>

        <p><?= htmlspecialchars($traductions['membre']) ?> <a href="<?php echo url('auth/login'); ?>"><?= htmlspecialchars($traductions['connexion']) ?></a></p>

        <p><a href="<?php echo url('index'); ?>"><?= htmlspecialchars($traductions['retour_accueil']) ?></a></p>
    </main>

    <?php require_once __DIR__ . "/../../src/includes/footer.php"; ?>

</body>

</html>