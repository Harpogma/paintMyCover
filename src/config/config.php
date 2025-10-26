<?php

define('BASE_URL', 'http://localhost/paintMyCover/');

function url($path = '') {
    if ($path && !str_ends_with($path, '.php')) {
        $path .= '.php';
    }
    return BASE_URL . ltrim($path, '/');
}

?>