<?php

define('BASE_URL', 'http://localhost/paintMyCover/');

function url($path = '') {
    return BASE_URL . ltrim($path, '/');
}
?>