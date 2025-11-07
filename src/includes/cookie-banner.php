<?php
require_once __DIR__ . '/../utils/cookie-manager.php';

if (isset($_POST['accept_cookies'])) {
    CookieManager::setConsent();
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}

if (!CookieManager::hasConsent()): 
?>
<hr>
<p>
    <strong><?= htmlspecialchars($traductions['cookies_message'] ?? 'Ce site utilise des cookies.') ?></strong>
</p>
<form method="post">
    <button type="submit" name="accept_cookies">
        <?= htmlspecialchars($traductions['cookies_accepter'] ?? 'Accepter') ?>
    </button>
</form>
<hr>
<?php endif; ?>