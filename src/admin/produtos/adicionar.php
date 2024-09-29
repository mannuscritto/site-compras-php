<html lang="pt-br">
    <head>
        <title>Adicionar produto</title>
        <meta charset="utf-8"/>
</head>
<body>
<h1>Adicionar Produto</h1>
<form action="../../controllers/products/addProduct.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Detalhes do produto</legend>
        <ul>
            <li>
                <label for="cModelo">Modelo</label>
                <input type="text" name="tModelo" id="cModelo" value="RTX " required maxlength="30"/>
            </li>
            <li>
                <label for="cCategoria">Categoria</label>
                <select name="tCategoria" id="cCategoria">
                    <option value="1">Categoria 1</option>
                    <option value="2">Categoria 2</option>
                    <option value="3">Categoria 3</option>
                </select>
            </li>
            <li>
                <label for="cPrecoBase">Preço</label>
                <input type="number" name="tPrecoBase" id="cPrecoBase" value="1988.00" required/>
            </li>
            <li>
                <label for="cDesconto">Desconto</label>
                <input type="number" name="tDesconto" id="cDesconto" value="0" required/>
            </li>
            <li>
                <label for="cFabricante">Fabricante</label>
                <input type="number" name="tFabricante" id="cFabricante" value="1" required/>
            </li>
            <li>
                <label for="cDescricao">Descrição</label>
                <textarea rows="3" name="tDescricao" id="cDescricao" maxlength="200"></textarea>
            </li>
            <li>
                <label for="cEstoque">Estoque</label>
                <input type="number" name="tEstoque" id="cEstoque" value="1" required/>
            </li>
            <li>
                <label for="cNovo">Novo</label>
                <input type="checkbox" name="tNovo" id="cNovo" checked />
            </li>
            <li>
                <label for="cImagens">Imagens</label>
                <input type="file" name="tImagens[]" id="cImagens" multiple>
            </li>
        </ul>    
        <input type="submit" value="Adicionar" />
    </fieldset>
</form>
</body>
</html>