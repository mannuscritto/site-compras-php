<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Se a chamada for pelo método GET
    if (isset($_GET['id'])) { // e se receber um id de um produto
        $product = read_product($_GET['id']); // pegue os dados do produto do banco

        if (isset($product)) {
            http_response_code(200); // retorne status OK
            echo json_encode($product); // e retorne os dados do produto
        }
    } else { // se não tiver passado um id
        $products = browse_product(); // pegue os dados de todos os produtos do banco
        if (isset($products)) {
            http_response_code(200); // retorne status OK
            echo json_encode($products); // e retorne uma lista com todos os produtos
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') { // Se a chamada for pelo método POST
    $json = file_get_contents('php://input'); // pega o conteúdo da requisição
    $data = json_decode($json, true); // decodifica de json para um array PHP

    $productId = add_product($data); // tenta adicionar o produto ao banco
    if (isset($productId)) { // se obter sucesso
        http_response_code(200); // retorne status OK
        echo json_encode($productId);// e retorna o ID do produto recém-adicionado
    } else {
        http_response_code(400); // se falhar ao adicionar, retorne falha de REQUISIÇÃO RUIM
    }
} elseif($_SERVER['REQUEST_METHOD'] == 'PATCH') { // Se a chamada for pelo método PATCH
    if (isset($_GET['id'])) { // e se tiver passado um ID de um produto
        $productId = $_GET['id'];

        $json = file_get_contents('php://input'); // pega o conteúdo da requisição com os novos dados
        $data = json_decode($json, true); // decodifica de json para um array PHP

        $oldData = read_product($productId); // pegue os dados antigos do produto que já estão no banco

        if (edit_product($productId, $oldData, $data)) { // tenta trocar os dados pelos novos
            http_response_code(204); // retorne status OK apenas, sem conteúdo na resposta
        } else {
            http_response_code(400); // se falhar ao alterar, retorne falha de REQUISIÇÃO RUIM
        }
    } else {
        http_response_code(400); // se não tiver passado um ID de um produto, retorne falha de REQUISIÇÃO RUIM
    }
} elseif($_SERVER['REQUEST_METHOD'] == 'DELETE') { // Se a chamada for pelo método DELETE
    if (isset($_GET['id'])) { // e se tiver passado um id de um produto
        $productId = $_GET['id'];
    }

    if (delete_product($productId)) { // tente deletar o produto
        http_response_code(204); // se sucesso, retorne status OK
    } else {
        http_response_code(400); // se falha ao deletar, retorne falha REQUISIÇÃO RUIM
    }
}

function browse_product() { // função que carrega os produtos do banco e retorna como um vetor de objetos
    include '../db.php';

    $sql = "SELECT * FROM produto";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $listOfProducts = array();

        while ($row = $result->fetch_assoc()) {
            $listOfProducts[] = $row;
        }

        return $listOfProducts;
    } else {
        echo null;
    }
}

function read_product($id) {
    include '../db.php';

    $sql = "SELECT * FROM produto WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

// Função que recebe o id do produto a ser alterado e os novos dados
function edit_product($id, $oldData, $newData) {
    include '../db.php';

    // Array para armazenar os campos alterados
    $updates = [];

    // Iterar sobre os novos dados e comparar com os antigos
    foreach ($newData as $key => $newValue) {
        if (array_key_exists($key, $oldData)
            && $newValue !== $oldData[$key]) {
                // Apenas adiciona o campo se o valor mudou
                $updates[] = "$key = '$newValue'";
        }
    }

    // Se não há alterações, não faz nada
    if (empty($updates)) {
        return false;
    }

    // Cria a query dinamicamente com apenas os campos alterados
    $sql = "UPDATE produto SET " . implode(', ', $updates) . " WHERE id = '$id'";
    if ($conn->query($sql) === true) {
        return true;
    } else {
        return false;
    }
}

// Função que recebe novos dados e adiciona um novo produto
function add_product($newData) {
    include '../db.php';

    $values = [];
    foreach ($newData as $value) {
        $values[] = "'$value'";
    }

    $sql = "INSERT INTO produto(" . implode(', ', array_keys($newData)) . ")
        VALUES(" . implode(', ', $values) . ") RETURNING id";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return null;
    }
}

// Função que recebe um id e deleta o produto
function delete_product($id) {
    include '../db.php';

    $sql = "DELETE from produto WHERE id = '$id'";
    if ($conn->query($sql) === true) {
        return true;
    } else {
        return false;
    }
}

?>