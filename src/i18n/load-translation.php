<?php
require_once __DIR__ . '/../utils/cookie-manager.php';

const DEFAULT_LANG = 'fr';

// Récupérer la langue du cookie ou utilise celle par défaut
$lang = CookieManager::getLanguage() ?? DEFAULT_LANG;

function loadTranslation($lang) {
    $lang_file = __DIR__ . "/translations/{$lang}.php";

    // Utilisation de la langue par défaut si la langue/le fichier n'existe pas
    if (!file_exists($lang_file)) {
        $lang_file = __DIR__ . "/translations/fr.php";
    }

    return require $lang_file;
}

$traductions = loadTranslation($lang);