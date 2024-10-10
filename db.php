<?php
$servername = "localhost"; // Altere se necessário
$username = "seu_usuario"; // Seu usuário do banco de dados
$password = "sua_senha"; // Sua senha do banco de dados
$dbname = "db_contas_receber"; // Nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>