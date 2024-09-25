<?php

function createAddress($address) {
    global $pdo;
    $sql = "INSERT INTO enderecos (usuario_id, nome, endereco, complemento, bairro, cidade, estado, cep) VALUES (:usuario_id, :nome, :endereco, :complemento, :bairro, :cidade, :estado, :cep) RETURNING id";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute($address)) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return null;
    }
}

?>