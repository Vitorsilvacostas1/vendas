<?php
// Definindo username e password corretos (simples para teste)
$correct_username = 'admin';
$correct_password = '1234';

// Pegando dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Verificando se o login está correto
if ($username == $correct_username && $password == $correct_password) {
    // Login bem-sucedido, redirecionar para página de boas-vindas
    header('Location: welcome.php');
    exit();
} else {
    // Login falhou, mostrar mensagem de erro
    echo '<script>alert("Username ou senha incorretos!"); window.location.href="index.html";</script>';
}
?>
