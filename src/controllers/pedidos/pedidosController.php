<?php

require_once '../../config/db.php';

function pedidos_browse() {
    global $pdo;
    $sql = "SELECT pedidos.id AS pedido_id, usuarios.nome_completo, usuarios.email, enderecos.cidade, enderecos.estado, pedidos.data_pedido, pedidos.total FROM pedidos JOIN usuarios ON pedidos.usuario_id = usuarios.id JOIN enderecos ON pedidos.endereco_id = enderecos.id";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>