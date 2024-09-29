<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newProduct = array(
        "id" => $_POST['tId'],
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

    require_once '../productController.php';

    $controller = new ProductController();
    $oldProduct = $controller->show($newProduct['id']);

    if (isset($_POST['tNovo'])) {
        $newProduct["novo"] = 1;
    }

    if (isset($_FILES['tImagens']) && !$_FILES['tImagens']['error'][0] == UPLOAD_ERR_NO_FILE) {;
        $filenames = array();
        foreach ($_FILES['tImagens']['name'] as $file) {
            $filenames[] = $file;
        }
        $newProduct['imagens'] = json_encode($filenames, JSON_UNESCAPED_UNICODE);
    } else {
        $newProduct['imagens'] = $oldProduct['imagens'];
    }
    
    if ($controller->update($newProduct, $oldProduct)) {
        echo "Produto editado com sucesso!";
    } else {
        echo "Erro ao editar produto.";
    }
}

?>