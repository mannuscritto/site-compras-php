<?php

require_once '../config/auth.php';

if (!isLoggedIn()) {
    header('Location: admin/login.php');
    exit;
}

?>

<html lang="pt-br">
    <head>
        <title>Painel de Administração</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <header>
            <h1>Painel de Administração (<a href="../controllers/logoutController.php">sair</a>)</h1>
            <p>Gerencie tudo sobre seu site.</p>
        </header>
        <nav>
            <section>
            <span><a target='_blank' href='http://localhost:8080/'>Acesse PHPMyAdmin</a></p></span>
            </section>
            <span>Produtos</span>
            <ul>
                <li><a href="./produtos/">Ver Produtos</a></li>
                <li><a href="./produtos/adicionar.php">Adicionar Produto</a></li>
            </ul
            <span>Pedidos</span>
            <ul>
                <li><a href="./pedidos/">Ver Pedidos</a></li>
            </ul>           
        </nav>
    </body>
</html>