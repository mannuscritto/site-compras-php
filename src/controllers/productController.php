<?php

require_once '../../config/db.php';

class ProductController {
    public function index() {
        global $pdo;
        $sql = "SELECT * FROM produto";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. Read (Exibir um produto específico)
    public function show($id) {
        global $pdo;
        $sql = "SELECT * FROM produto WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 3. Add (Criar um produto)
    public function store($product) {
        global $pdo;
        $sql = "INSERT INTO produto(modelo, categoria, preco_base, desconto, fabricante, imagens, descricao, estoque, novo) VALUES(:modelo, :categoria, :preco_base, :desconto, :fabricante, :imagens, :descricao, :estoque, :novo)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute($product);
    }

    // 4. Edit (Atualizar um usuário existente)
    public function update($newData, $oldData) {
        global $pdo;
        // Array para armazenar os campos alterados
        $updates = [];
        $params = [];

        // Iterar sobre os novos dados e comparar com os antigos
        foreach ($newData as $key => $newValue) {
            if (array_key_exists($key, $oldData) && $newValue !== $oldData[$key]) {
                // Apenas adiciona o campo se o valor mudou
                $updates[] = "$key = :$key";
                $params[":$key"] = $newValue;
            }
        }

        // Se não há alterações, não faz nada
        if (empty($updates)) {
            return false;
        }

        // Cria a query dinamicamente com apenas os campos alterados
        $query = "UPDATE produto SET " . implode(', ', $updates) . " WHERE id = :id";
        $params[':id'] = $newData['id'];

        // Prepara e executa a query
        $stmt = $pdo->prepare($query);
        return $stmt->execute($params);
    }

    // 5. Delete (Excluir um usuário)
    public function destroy($id) {
        global $pdo;
        $sql = "DELETE FROM produto WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

?>