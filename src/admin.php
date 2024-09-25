<?php
    require_once 'config/auth.php';

    if (!isLoggedIn()) {
        header('Location: admin/login.php');
        exit;
    } else {
        header('Location: admin/dashboard.php');
        exit;
    }
?>