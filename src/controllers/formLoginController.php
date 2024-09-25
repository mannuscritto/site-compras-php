<?php
require_once "../config/db.php";
require "../config/userAuth.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['emailLogin'];
    $password = $_POST['senhaLogin'];

    if (login($email, $password)) {
        header('Location: ../index.php');
        exit;
    } else {
        echo "Usuário ou senha inválidos.";
    }
}
?>