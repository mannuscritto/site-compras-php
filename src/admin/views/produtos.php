<?php
    if (isset($_GET['acao'])) {
        $action = $_GET['acao'];
        if ($action == 'adicionar') {
            add_product();
        }
    } else {
        browse_products();
    }

    // Função que mostra todos os produtos
    function browse_products() {
        echo "<h1>Lista de Produtos</h1>";
        echo "<p><a href='" . $_SERVER['REQUEST_URI'] . "&acao=adicionar'>Adicionar produto</a></p>";

        include '../db.php';

        $sql = "SELECT id, modelo, preco_base FROM produto";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<ul>';
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['modelo']} | {$row['preco_base']}</li>";
            }
            echo '</ul>';
        } else {
            echo "Nenhum produto encontrado";
        }
    }

    // Função que adiciona um produto
    function add_product() {
        if (isset($_POST['tModelo'])) {
            $model = $_POST['tModelo'];
            $cat = $_POST['tCategoria'];
            $price = $_POST['tPrecoBase'];
            $discount = $_POST['tDesconto'];
            $fab = $_POST['tFabricante'];
            $desc = $_POST['tDescricao'];
            $stock = $_POST['tEstoque'];

            if (isset($_POST['tNovo'])) {
                $novo = TRUE;
            }

            include '../db.php';

            $sql = "INSERT INTO produto(modelo, categoria, preco_base, desconto, fabricante, descricao, estoque, novo) 
            VALUES('$model', '$cat', '$price', '$discount', '$fab', '$desc', '$stock', '$novo')";

            if ($conn->query($sql) === TRUE) {
                echo "Produto adicionado com sucesso!";
            } else {
                echo "Erro: " . $conn->error;
            }
        }

        echo "<h1>Adicionar Produto</h1>";

        echo '<form action="" method="POST">
            <input type="text" name="tModelo" value="RTX 4060" />
            <input type="number" name="tCategoria" value="1" />
            <input type="number" name="tPrecoBase" value="1988.00" />
            <input type="number" name="tDesconto" value="0" />
            <input type="number" name="tFabricante" value="1" />
            <input type="text" name="tDescricao" value="Uma placa de entrada" />
            <input type="number" name="tEstoque" value="1" />
            <label for="cNovo">Novo</label>
            <input type="checkbox" name="tNovo" id="cNovo" checked />
            <input type="submit" value="Adicionar" />
        </form>';
    }
?>