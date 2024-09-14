<?php
    if (isset($_GET['acao'])) {
        $action = $_GET['acao'];
        if ($action == 'adicionar') {
            include 'add.php';
        }
    } else {
        include 'browse.php';
    }
?>