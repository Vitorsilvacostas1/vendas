<?php
include 'db.php';

// Consultando duplicatas
$sql = "SELECT * FROM duplicata";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Duplicatas</title>
</head>
<body>
    <h1>Gerenciamento de Duplicatas</h1>
    <a href="add.php">Adicionar Nova Duplicata</a>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Número</th>
            <th>Valor</th>
            <th>Vencimento</th>
            <th>Banco</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['Nome']; ?></td>
            <td><?php echo $row['Numero']; ?></td>
            <td><?php echo $row['Valor']; ?></td>
            <td><?php echo $row['Vencimento']; ?></td>
            <td><?php echo $row['Banco']; ?></td>
            <td>
                <a href="edit.php?numero=<?php echo $row['Numero']; ?>">Editar</a>
                <a href="delete.php?numero=<?php echo $row['Numero']; ?>">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>