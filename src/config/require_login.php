<?php
session_start();

function require_login($requiredRole = null)
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: /auth/login.php");
        exit();
    }

    if ($requiredRole !== null) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== $requiredRole) {
            http_response_code(403);
            echo "Access denied.";
            exit();
        }
    }
}
