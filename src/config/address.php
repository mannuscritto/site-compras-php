<?php

function createAddress($address) {
    global $pdo;
    $sql = "INSERT INTO enderecos (usuario_id, nome, endereco, complemento, bairro, cidade, estado, cep) VALUES (:usuario_id, :nome, :endereco, :complemento, :bairro, :cidade, :estado, :cep)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute($address)) {
        return $pdo->lastInsertId();
    } else {
        return null;
    }
}

?>