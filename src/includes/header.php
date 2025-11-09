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
            <li><a href="<?php echo url('register'); ?>"><?= htmlspecialchars($traductions['connexion']) ?></a></li>
        </ul>
    </nav>
</header>