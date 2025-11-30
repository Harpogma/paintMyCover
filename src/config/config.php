<?php

define('BASE_URL', 'https://paintmycover.ch/');

function url($path = '') {
    if ($path && !str_ends_with($path, '.php') && !str_ends_with($path, '.css')) {
        $path .= '.php';
    }
    return BASE_URL . ltrim($path, '/');
}

?>