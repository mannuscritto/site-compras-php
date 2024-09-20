<?php

// Configuração da conexão com o banco de dados
$env = parse_ini_file(".env");

// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host={$env['MYSQL_SERVER']};dbname={$env['MYSQL_DATABASE']}", $env["MYSQL_USER"], $env["MYSQL_PASSWORD"]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    die();
}
?>
