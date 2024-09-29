<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $prodId = $_GET['id'];

    require_once '../productController.php';

    $controller = new ProductController();
    
    if ($controller->destroy($prodId)) {
        echo "Produto deletado com sucesso!";
    } else {
        echo "Erro ao deletar produto.";
    }
}

?>