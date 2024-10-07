<?php

require_once '../../config/db.php';
require_once '../../config/auth.php';

if (!isLoggedIn()) {
    header('Location: admin/login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Ver Produtos | Painel de Administração</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1>Produtos</h1>
        <table>
                <thead>
                    <tr>
                        <th>Número do pedido</th>
                        <th>Nome do usuário</th>
                        <th>Email do usuário</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Data do pedido</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once '../../controllers/pedidos/pedidosController.php';

                        $pedidos = pedidos_browse();

                        foreach ($pedidos as $pedido) {
                            echo "<tr>
                                <td>{$pedido['pedido_id']}</td>
                                <td>{$pedido['nome_completo']}</td>
                                <td>{$pedido['email']}</td>
                                <td>{$pedido['cidade']}</td>
                                <td>{$pedido['estado']}</td>
                                <td>{$pedido['data_pedido']}</td>
                                <td>{$pedido['total']}</td>
                            </tr>";
                        }
                    ?>
            </tbody>
        </table>
    </body>
</html>