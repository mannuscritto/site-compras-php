<?php

// Configuração da conexão com o banco de dados
$servername = "mariadb";
$username = "jhromero";
$password = "mariadb";
$dbname = "graphik";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>