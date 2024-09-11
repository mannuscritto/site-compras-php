<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header('Location: login.php');
        exit;
    }
    echo "<h1>Bem vindo, " . $_COOKIE['admin_username'] . "!</h1>";

    if (isset($_GET['pagina'])) {
        $page = $_GET['pagina'];
        if ($page == 'produtos') {
            include 'views/produtos.php';
        }
    }
?>

<html lang="pt-br">
    <head>
        <title>Painel de Controle</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1></h1>
    </body>
</html>