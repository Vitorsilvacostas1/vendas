<?php
// Incluir o arquivo de conexão ao banco de dados
include 'conexao.php'; // Use o arquivo de conexão que você criou anteriormente

// Consultar todos os produtos cadastrados
$sql = "SELECT * FROM Produto";
$stmt = $pdo->query($sql);
$produtos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Cadastrados</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link para o CSS -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Produtos Cadastrados</h1>
        <table>
            <thead>
                <tr>
                    <th>Código do Produto</th>
                    <th>Descrição do Produto</th>
                    <th>Preço do Produto</th>
                    <th>Peso do Produto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produto['Codigo_Produto']); ?></td>
                        <td><?php echo htmlspecialchars($produto['Descricao_Produto']); ?></td>
                        <td><?php echo htmlspecialchars($produto['Preco_Produto']); ?></td>
                        <td><?php echo htmlspecialchars($produto['Peso']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
