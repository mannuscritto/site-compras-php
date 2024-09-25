<?php

require_once "../config/db.php";
require_once "../config/userAuth.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nomecompleto'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cSenha = $_POST['cSenha'];

    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($cSenha)) {
        if ($senha === $cSenha) {
            if (signin($nome, $email, $senha)) {
                echo "Usuário cadastrado com sucesso!";
            } else {
                echo "Falha ao cadastrar usuário!";
            }
        }
    }
}

?>