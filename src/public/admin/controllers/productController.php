<?php

require_once '../../config/db.php';

class ProductController {
    public function index() {
        global $pdo;
        $sql = "SELECT * FROM produto";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. Read (Exibir um usuário específico)
    public function show($id) {
        global $pdo;
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 3. Add (Criar um novo usuário)
    public function store($user) {
        global $pdo;
        $sql = "INSERT INTO produto(modelo, categoria, preco_base, desconto, fabricante, imagens, descricao, estoque, novo) VALUES(:modelo, :categoria, :preco_base, :desconto, :fabricante, :imagens, :descricao, :estoque, :novo)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute($user);
    }

    // 4. Edit (Atualizar um usuário existente)
    public function update($id, $name, $email) {
        global $pdo;
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // 5. Delete (Excluir um usuário)
    public function destroy($id) {
        global $pdo;
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

?>