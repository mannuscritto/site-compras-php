<?php

require_once '../../config/auth.php';

if (!isLoggedIn()) {
    header('Location: admin/login.php');
    exit;
}

require_once "../../controllers/productController.php";

if (isset($_GET['id'])) {
    $prodController = new ProductController();
    $produto = $prodController->show($_GET['id']);
    $prodCat = $produto['categoria'];
}

?>

<html lang="pt-br">
    <head>
        <title>Editar produto</title>
        <meta charset="utf-8"/>
</head>
<body>
<h1>Editar Produto</h1>
<form action="../../controllers/products/editProduct.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Detalhes do produto</legend>
        <ul>
            <input type="hidden" name="tId" value="<?php echo $produto['id']; ?>"/>
            <li>
                <label for="cModelo">Modelo</label>
                <input type="text" name="tModelo" id="cModelo" value="<?php echo $produto['modelo']; ?>" required maxlength="30"/>
            </li>
            <li>
                <label for="cCategoria">Categoria</label>
                <select name="tCategoria" id="cCategoria">
                    <option value="1" <?php echo $prodCat == '1' ? 'selected' : '' ?>>Categoria 1</option>
                    <option value="2" <?php echo $prodCat == '2' ? 'selected' : '' ?>>Categoria 2</option>
                    <option value="3" <?php echo $prodCat == '3' ? 'selected' : '' ?>>Categoria 3</option>
                </select>
            </li>
            <li>
                <label for="cPrecoBase">Preço</label>
                <input type="number" name="tPrecoBase" id="cPrecoBase" value="<?php echo $produto['preco_base']; ?>" required/>
            </li>
            <li>
                <label for="cDesconto">Desconto</label>
                <input type="number" name="tDesconto" id="cDesconto" value="<?php echo $produto['desconto']; ?>" required/>
            </li>
            <li>
                <label for="cFabricante">Fabricante</label>
                <input type="number" name="tFabricante" id="cFabricante" value="<?php echo $produto['fabricante']; ?>" required/>
            </li>
            <li>
                <label for="cDescricao">Descrição</label>
                <textarea rows="3" name="tDescricao" id="cDescricao" maxlength="200"><?php echo $produto['descricao']; ?></textarea>
            </li>
            <li>
                <label for="cEstoque">Estoque</label>
                <input type="number" name="tEstoque" id="cEstoque" value="<?php echo $produto['estoque']; ?>" required/>
            </li>
            <li>
                <label for="cNovo">Novo</label>
                <input type="checkbox" name="tNovo" id="cNovo" <?php echo $produto['novo'] == '1' ? 'checked' : '' ?> />
            </li>
            <li>
                <label for="cImagens">Imagens</label>
                <input type="file" name="tImagens[]" id="cImagens" multiple>
            </li>
        </ul>    
        <input type="submit" value="Salvar" />
    </fieldset>
</form>
</body>
</html>