<?php
    require_once 'config/auth.php';

    if (!isLoggedIn()) {
        header('Location: views/login.php');
        exit;
    } else {
        header('Location: views/dashboard.php');
        exit;
    }
?>