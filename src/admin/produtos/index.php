<?php

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
                    <th>Modelo do Produto</th>
                    <th>Preço Base</th>
                    <th>Desconto</th>
                    <th>Descrição</th>
                    <th>Estoque</th>
                    <th>É novo?</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
        <?php
            require_once '../../controllers/productController.php';

            $controller = new ProductController();
            $products = $controller->index();

            foreach ($products as $product) {
                $novo = $product['novo'] == 0 ? 'Não' : 'Sim';
                $lim = 80;//Tamanho maximo da descricao
                $descricao = strlen($product['descricao']) > $lim-3 ? substr($product['descricao'], 0, $lim-4) . "..." : $product['descricao'];
                echo "<tr>
                    <td>{$product['modelo']}</td>
                    <td>{$product['preco_base']}</td>
                    <td>{$product['desconto']}%</td>
                    <td>{$descricao}</td>
                    <td>{$product['estoque']}</td>
                    <td>{$novo}</td>
                    <td><a href='editar.php?id={$product['id']}'>Editar</a></td>
                    <td><a href='../../controllers/products/deleteProduct.php?id={$product['id']}'>Excluir</a></td>
                </tr>";
            }

        ?>
        </table>
    </body>
</html>