<?php
session_start();
define('BASE_URL', 'https://paintmycover.ch/');

$lang = $_SESSION['lang'] ?? 'fr';
require_once __DIR__ . '/../i18n/load-translation.php';
$traductions = loadTranslation($lang);

function url($path = '') {
    if ($path && !str_ends_with($path, '.php')) {
        $path .= '.php';
    }
    return BASE_URL . ltrim($path, '/');
}

?>