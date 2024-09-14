<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header('Location: login.php');
        exit;
    }
    echo "<h1>Bem vindo, " . $_COOKIE['admin_username'] . "!</h1>";
    echo "<p><a target='_blank' href='http://localhost:8080/'>Acesse PHPMyAdmin</a></p>";

    if (isset($_GET['pagina'])) {
        $page = $_GET['pagina'];
        if ($page == 'produtos') {
           include 'views/produtos.php';
        }
    } else {
        include 'views/dashboard.php';
    }
?>