<?php
// Definindo as variáveis de conexão
$servername = "localhost"; // ou o endereço do seu servidor de banco de dados
$username = "seu_usuario"; // seu nome de usuário do MySQL
$password = "sua_senha"; // sua senha do MySQL
$dbname = "db_contas_receber"; // nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";

// Exemplo de consulta: Listar nome, vencimento e valor de cada duplicata
$sql = "SELECT Nome, Vencimento, Valor FROM duplicata";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Saída de cada linha da tabela
    while ($row = $result->fetch_assoc()) {
        echo "Nome: " . $row["Nome"] . " - Vencimento: " . $row["Vencimento"] . " - Valor: " . $row["Valor"] . "<br>";
    }
} else {
    echo "0 resultados";
}

// Fechando a conexão
$conn->close();
?>
