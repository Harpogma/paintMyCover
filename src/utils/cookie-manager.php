<?php
class CookieManager {
    
    public static function hasConsent() {
        return isset($_COOKIE['cookie_consent']);
    }
    
    public static function setConsent() {
        setcookie('cookie_consent', 'accepted', time() + (365 * 24 * 60 * 60));
    }
    
    public static function setLanguage($lang) {
        setcookie('language', $lang, time() + (30 * 24 * 60 * 60));
    }
    
    public static function getLanguage() {
        if (isset($_COOKIE['language'])) {
            return $_COOKIE['language'];
        }
        return null;
    }
}