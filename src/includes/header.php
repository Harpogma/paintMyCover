<header class="container">
    <nav>
        <ul>
            <a href="<?php echo url('index'); ?>">
                <li><strong>Paint My Cover</strong></li>
            </a>
        </ul>
        <ul>
            <li><a href="<?php echo url('about'); ?>"><?= htmlspecialchars($traductions['propos']) ?></a></li>
            <li><a href="<?php echo url('contact'); ?>">Contact</a></li>
<?php if (isset($_SESSION['user_id'])): ?>
                <li><span><?= htmlspecialchars($_SESSION['username']) ?></span></li>

                <li><a href="<?php echo url('auth/logout'); ?>" role="button" class="secondary"><?= htmlspecialchars($traductions['deconnexion'] ?? 'Déconnexion') ?></a></li>
            <?php else: ?>
                <li><a href="<?php echo url('auth/login'); ?>"><?= htmlspecialchars($traductions['connexion']) ?></a></li>

            <li><a href="<?php echo url('auth/register'); ?>"><?= htmlspecialchars($traductions['connexion']) ?></a></li>
        <?php endif; ?>
        </ul>
    </nav>
</header>