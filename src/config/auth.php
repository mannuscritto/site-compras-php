<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['admin_id']);
}

function login($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE usuario = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['senha'])) {
        $_SESSION['admin_id'] = $user['id'];
        return true;
    } else {
        return false;
    }
}

function logout() {
    session_destroy();
}