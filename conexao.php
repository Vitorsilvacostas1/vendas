<?php
// Definindo as variáveis de conexão
$host = 'localhost'; // ou o IP do servidor MySQL
$db   = 'db_vendas'; // Nome do banco de dados
$user = 'seu_usuario'; // Usuário do MySQL
$pass = 'sua_senha'; // Senha do MySQL
$charset = 'utf8mb4';

// Configuração da DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Criar uma nova conexão PDO
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Conexão estabelecida com sucesso!";
} catch (\PDOException $e) {
    // Em caso de erro, mostrar uma mensagem
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
