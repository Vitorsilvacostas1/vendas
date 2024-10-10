<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $valor = $_POST['valor'];
    $vencimento = $_POST['vencimento'];
    $banco = $_POST['banco'];

    $sql = "INSERT INTO duplicata (Nome, Numero, Valor, Vencimento, Banco) VALUES ('$nome', $numero, $valor, '$vencimento', '$banco')";

    if ($conn->query($sql) === TRUE) {
        echo "Nova duplicata adicionada com sucesso!";
        header("Location: index.php");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Duplicata</title>
</head>
<body>
    <h1>Adicionar Nova Duplicata</h1>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        <label for="numero">Número:</label>
        <input type="number" name="numero" required><br>
        <label for="valor">Valor:</label>
        <input type="text" name="valor" required><br>
        <label for="vencimento">Vencimento:</label>
        <input type="date" name="vencimento" required><br>
        <label for="banco">Banco:</label>
        <input type="text" name="banco" required><br>
        <input type="submit" value="Adicionar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>

<?php $conn->close(); ?>