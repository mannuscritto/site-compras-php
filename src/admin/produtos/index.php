<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Ver Produtos | Painel de Administração</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1>Produtos</h1>
        <table>
        <?php
            require_once '../../controllers/productController.php';

            $controller = new ProductController();
            $products = $controller->index();

            foreach ($products as $product) {
                echo "<tr>
                    <td>{$product['modelo']}</td>
                    <td>{$product['preco_base']}</td>
                </tr>";
            }

        ?>
        </table>
    </body>
</html>