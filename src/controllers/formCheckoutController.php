<?php

session_start();

require_once "../config/db.php";
require_once "../config/order.php";
require_once "../config/address.php";
require_once "../config/order-item.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $address = array(
        "usuario_id" => $_SESSION['user_id'],
        "nome" => $_POST['name'],
        "endereco" => $_POST['address'],
        "complemento" => $_POST['complement'] | "",
        "bairro" => $_POST['bairro'],
        "cidade" => $_POST['city'],
        "estado" => $_POST['state'],
        "cep" => $_POST['zip-code']
    );

    $order = array(
        "usuario_id" => $_SESSION['user_id'],
        "total" => $_POST['precoTotal']
    );

    $order_items = $_POST['produtos'];
    
    $endereco = createAddress($address);
    if ($endereco['id'] != null) {
        $order['endereco_id'] = $endereco['id'];
        $pedido = createOrder($order);
        if ($pedido['id'] != null) {
            foreach ($order_items as $order_item) {
                $order_item_data = array(
                    "pedido_id" => $pedido['id'],
                    "produto_id" => $order_item['id'],
                    "quantidade" => $order_item['quant'],
                    "preco_unitario" => $order_item['preco'],
                    "subtotal" => $order_item['quant'] * $order_item['preco']
                );
                if (!createOrderItem($order_item_data)) {
                    echo "Falha ao cadastrar itens de pedido";
                }
                header('Location: ../orderPayment.php?id=' . $pedido['id']);
            }
        } else {
            echo "Falha ao realizar o pedido!";
        }
    } else {
        echo "Não foi possível salvar o endereço!";
    }
}

?>