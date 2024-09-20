<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUser = array(
        "modelo" => $_POST['tModelo'],
        "categoria" => $_POST['tCategoria'],
        "preco_base" => $_POST['tPrecoBase'],
        "desconto" => $_POST['tDesconto'],
        "fabricante" => $_POST['tFabricante'],
        "imagens" => "[]",
        "descricao" => $_POST['tDescricao'],
        "estoque" => $_POST['tEstoque'],
        "novo" => 0
    );

    if (isset($_POST['tNovo'])) {
        $newUser["novo"] = 1;
    }

    if (isset($_FILES['tImagens'])) {
            $filenames = array();
            foreach ($_FILES['tImagens']['name'] as $file) {
                $filenames[] = $file;
            }
            $newUser['imagens'] = json_encode($filenames, JSON_UNESCAPED_UNICODE);
    }

    require_once '../productController.php';

    $controller = new ProductController();
    
    if ($controller->store($newUser)) {
        echo "Usuário adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar usuário.";
    }
}

?>