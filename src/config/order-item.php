<?php

function createOrderItem($order_item) {
    global $pdo;
    $sql = "INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, preco_unitario, subtotal) VALUES (:pedido_id, :produto_id, :quantidade, :preco_unitario, :subtotal)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute($order_item)) {
        return true;
    } else {
        return null;
    }
}

?>