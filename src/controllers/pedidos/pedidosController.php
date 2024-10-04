<?php

//require_once '../../config/db.php';

function pedidos_browse() {
    global $pdo;
    $sql = "SELECT pedidos.id AS pedido_id, usuarios.nome_completo, usuarios.email, enderecos.cidade, enderecos.estado, pedidos.data_pedido, pedidos.total FROM pedidos JOIN usuarios ON pedidos.usuario_id = usuarios.id JOIN enderecos ON pedidos.endereco_id = enderecos.id";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function pedido_read($pedido_id) {
    global $pdo;
    $sql = "SELECT pedidos.id AS pedido_id, usuarios.nome_completo, usuarios.email, CONCAT_WS('\n', enderecos.nome, enderecos.endereco, enderecos.complemento, enderecos.bairro, enderecos.cidade, enderecos.estado) AS endereco, pedidos.data_pedido, pedidos.total FROM pedidos JOIN usuarios ON pedidos.usuario_id = usuarios.id JOIN enderecos ON pedidos.endereco_id = enderecos.id WHERE pedidos.id = ?";
    $stmt = $pdo->prepare($sql);
    //$stmt->bindParam(':id', $pedido_id);
    $stmt->execute([$pedido_id]);
    return $stmt->fetch();
}
?>