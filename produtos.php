<?php

include 'conexao.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
    
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $peso = $_POST['peso'];

    
    $sqlCheck = "SELECT * FROM Produto WHERE Codigo_Produto = ?";
    $stmtCheck = $pdo->prepare($sqlCheck);
    $stmtCheck->execute([$codigo]);

    if ($stmtCheck->rowCount() > 0) {
        
        $sqlUpdate = "UPDATE Produto SET Descricao_Produto = ?, Preco_Produto = ?, Peso = ? WHERE Codigo_Produto = ?";
        $stmtUpdate = $pdo->prepare($sqlUpdate);
        $stmtUpdate->execute([$descricao, $preco, $peso, $codigo]);
        $mensagem = "Produto atualizado com sucesso!";
    } else {
        
        $sqlInsert = "INSERT INTO Produto (Codigo_Produto, Descricao_Produto, Preco_Produto, Peso) VALUES (?, ?, ?, ?)";
        $stmtInsert = $pdo->prepare($sqlInsert);
        $stmtInsert->execute([$codigo, $descricao, $preco, $peso]);
        $mensagem = "Produto cadastrado com sucesso!";
    }
}


$produto = null;
if (isset($_GET['codigo_busca'])) {
    $codigo_busca = $_GET['codigo_busca'];

    
    $sql = "SELECT * FROM Produto WHERE Codigo_Produto = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$codigo_busca]);
    $produto = $stmt->fetch();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['acao']) && $_POST['acao'] === 'excluir') {
    $codigo = $_POST['codigo'];

    
    $sql = "DELETE FROM Produto WHERE Codigo_Produto = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$codigo]);
    $mensagem = "Produto excluído com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Produtos</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }

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
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerenciar Produtos</h1>

        <?php if (isset($mensagem)): ?>
            <p><?php echo htmlspecialchars($mensagem); ?></p>
        <?php endif; ?>

        
        <form action="" method="POST">
            <input type="hidden" name="acao" value="cadastrar">
            <div class="form-group">
                <label for="codigo">Código do Produto:</label>
                <input type="number" id="codigo" name="codigo" required value="<?php echo isset($produto['Codigo_Produto']) ? htmlspecialchars($produto['Codigo_Produto']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição do Produto:</label>
                <input type="text" id="descricao" name="descricao" required value="<?php echo isset($produto['Descricao_Produto']) ? htmlspecialchars($produto['Descricao_Produto']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="preco">Preço do Produto:</label>
                <input type="number" id="preco" name="preco" step="0.01" required value="<?php echo isset($produto['Preco_Produto']) ? htmlspecialchars($produto['Preco_Produto']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="peso">Peso do Produto:</label>
                <input type="number" id="peso" name="peso" step="0.01" required value="<?php echo isset($produto['Peso']) ? htmlspecialchars($produto['Peso']) : ''; ?>">
            </div>
            <button type="submit">Cadastrar/Atualizar</button>
        </form>

        
        <h2>Consultar Produto</h2>
        <form action="" method="GET">
            <div class="form-group">
                <label for="codigo_busca">Código do Produto:</label>
                <input type="number" id="codigo_busca" name="codigo_busca" required>
            </div>
            <button type="submit">Buscar</button>
        </form>

       
        <?php if ($produto): ?>
            <h2>Produto Encontrado</h2>
            <p>Código do Produto: <?php echo htmlspecialchars($produto['Codigo_Produto']); ?></p>
            <p>Descrição do Produto: <?php echo htmlspecialchars($produto['Descricao_Produto']); ?></p>
            <p>Preço do Produto: <?php echo htmlspecialchars($produto['Preco_Produto']); ?></p>
            <p>Peso do Produto: <?php echo htmlspecialchars($produto['Peso']); ?></p>
            
            
            <form action="" method="POST">
                <input type="hidden" name="acao" value="excluir">
                <input type="hidden" name="codigo" value="<?php echo htmlspecialchars($produto['Codigo_Produto']); ?>">
                <button type="submit">Excluir Produto</button>
            </form>
        <?php elseif (isset($_GET['codigo_busca'])): ?>
            <h2>Produto não encontrado.</h2>
        <?php endif; ?>
    </div>
</body>
</html>
