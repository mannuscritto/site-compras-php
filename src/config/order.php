<?php

function createOrder($order) {
    global $pdo;
    $sql = "INSERT INTO pedidos (usuario_id, endereco_id, total) VALUES (:usuario_id, :endereco_id, :total)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute($order)) {
        return $pdo->lastInsertId();
    } else {
        return null;
    }
}

?>