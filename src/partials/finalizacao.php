<table>
    <tr>
        <td>Usuário que realizou o pedido:</td>
        <td><?php echo $pInfo['nome_completo'] ?></td>
    </tr>
    <tr>
        <td>Informações de contato:</td>
        <td><?php echo $pInfo['email'] ?></td>
    </tr>
    <tr>
        <td>Data do pedido:</td>
        <td><?php echo $pInfo['data_pedido'] ?></td>
    </tr>
    <tr>
        <td>Total a pagar:</td>
        <td><?php echo $pInfo['total'] ?></td>
    </tr>
    <tr>
        <td>Endereço de entrega:</td>
        <td><?php echo $pInfo['endereco'] ?></td>
    </tr>
</table>