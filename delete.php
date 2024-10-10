<?php
include 'db.php';

$numero = $_GET['numero'];

$sql = "DELETE FROM duplicata WHERE Numero = $numero";

if ($conn->query($sql) === TRUE) {
    echo "Duplicata excluída com sucesso!";
    header("Location: index.php");
    exit();
} else {
    echo "Erro ao excluir duplicata: " . $conn->error;
}

$conn->close();
?>