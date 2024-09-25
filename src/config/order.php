<?php

function createOrder($order) {
    global $pdo;
    $sql = "INSERT INTO pedidos (usuario_id, endereco_id, total) VALUES (:usuario_id, :endereco_id, :total) RETURNING id";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute($order)) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return null;
    }
}

?>