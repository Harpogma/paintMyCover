<?php
session_start();
require_once __DIR__ . '/../../src/config/config.php';
require_once __DIR__ . '/../../src/i18n/load-translation.php';
require_once __DIR__ . '/../../src/utils/autoloader.php';
require_once __DIR__ . '/../../src/config/require_login.php';
require_login('admin');

use User\UsersManager;

$usersManager = new UsersManager();
$message = '';
$error = '';

// Traiter les actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_role'])) {
        $userId = (int)$_POST['user_id'];
        $newRole = $_POST['role'];
        
        // Empêcher l'admin de se retirer ses propres droits
        if ($userId === $_SESSION['user_id'] && $newRole === 'user') {
            $error = "Vous ne pouvez pas retirer vos propres droits d'administrateur.";
        } else {
            try {
                if ($usersManager->updateUserRole($userId, $newRole)) {
                    $message = "Rôle mis à jour avec succès.";
                }
            } catch (Exception $e) {
                $error = "Erreur : " . $e->getMessage();
            }
        }
    }
    
    if (isset($_POST['delete_user'])) {
        $userId = (int)$_POST['user_id'];
        
        // Empêcher l'admin de se supprimer lui-même
        if ($userId === $_SESSION['user_id']) {
            $error = "Vous ne pouvez pas supprimer votre propre compte.";
        } else {
            try {
                if ($usersManager->deleteUser($userId)) {
                    $message = "Utilisateur supprimé avec succès.";
                }
            } catch (Exception $e) {
                $error = "Erreur : " . $e->getMessage();
            }
        }
    }
}

$users = $usersManager->getAllUsers();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo url('css/custom.css'); ?>">
    <title>Gestion des Utilisateurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <?php require_once __DIR__ . "/../../src/includes/header.php"; ?>
    
    <main class="container">
        <h1>Gestion des Utilisateurs</h1>
        <p><a href="<?php echo url('adminDashboard'); ?>">← Retour au tableau de bord</a></p>
        
        <?php if ($message): ?>
            <article style="background-color: #d4edda; color: #155724; padding: 1rem;">
                <?= htmlspecialchars($message) ?>
            </article>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <article style="background-color: #f8d7da; color: #721c24; padding: 1rem;">
                <?= htmlspecialchars($error) ?>
            </article>
        <?php endif; ?>
        
        <h2>Liste des Utilisateurs</h2>
        
        <?php if (empty($users)): ?>
            <p>Aucun utilisateur trouvé.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom d'utilisateur</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['email'] ?? 'N/A') ?></td>
                            <td>
                                <form method="post" style="display: inline;">
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                    <select name="role" onchange="this.form.submit()" 
                                            <?= $user['id'] === $_SESSION['user_id'] ? 'disabled' : '' ?>>
                                        <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                    </select>
                                    <input type="hidden" name="update_role" value="1">
                                </form>
                            </td>
                            <td>
                                <?php if ($user['id'] !== $_SESSION['user_id']): ?>
                                    <form method="post" style="display: inline;" 
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                        <button type="submit" name="delete_user" class="secondary">Supprimer</button>
                                    </form>
                                <?php else: ?>
                                    <em>(Vous)</em>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
    
    <?php require_once __DIR__ . "/../../src/includes/footer.php"; ?>
</body>
</html>