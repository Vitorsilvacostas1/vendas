<?php
include 'db.php';

$numero = $_GET['numero'];
$sql = "SELECT * FROM duplicata WHERE Numero = $numero";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $vencimento = $_POST['vencimento'];
    $banco = $_POST['banco'];

    $sql = "UPDATE duplicata SET Nome='$nome', Valor='$valor', Vencimento='$vencimento', Banco='$banco' WHERE Numero=$numero";

    if ($conn->query($sql) === TRUE) {
        echo "Duplicata atualizada com sucesso!";
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
    <title>Editar Duplicata</title>
</head>
<body>
    <h1>Editar Duplicata</h1>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['Nome']; ?>" required><br>
        <label for="numero">Número:</label>
        <input type="number" name="numero" value="<?php echo $row['Numero']; ?>" readonly><br>
        <label for="valor">Valor:</label>
        <input type="text" name="valor" value="<?php echo $row['Valor']; ?>" required><br>
        <label for="vencimento">Vencimento:</label>
        <input type="date" name="vencimento" value="<?php echo $row['Vencimento']; ?>" required><br>
        <label for="banco">Banco:</label>
        <input type="text" name="banco" value="<?php echo $row['Banco']; ?>" required><br>
        <input type="submit" value="Atualizar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>

<?php $conn->close(); ?>