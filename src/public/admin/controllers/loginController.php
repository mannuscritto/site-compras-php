<?php
require_once "../config/db.php";
require_once "../config/auth.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['usuario'];
    $password = $_POST['senha'];

    if (login($username, $password)) {
        header('Location: ../views/dashboard.php');
        exit;
    } else {
        echo "Usuário ou senha inválidos.";
    }
}
?>