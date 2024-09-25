<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function login($email, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['senha'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nome_completo'];
        return true;
    } else {
        return false;
    }
}

function logout() {
    session_destroy();
}

function signin($name, $email, $password) {
    global $pdo;
    $sql = "INSERT INTO usuarios (nome_completo, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $pdo->prepare($sql);
    $newUser = array(
        'nome' => $name,
        'email' => $email,
        'senha' => password_hash($password, PASSWORD_BCRYPT)
    );
    if ($stmt->execute($newUser)) {
        return true;
    } else {
        return false;
    }
}