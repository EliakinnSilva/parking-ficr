<?php
session_start();
require_once("conexao.php"); // Arquivo com a conexão ao banco de dados
require_once("crud_usuarios.php"); // Substitua "funcoes_usuario.php" pelo nome do arquivo que contém as funções relacionadas aos usuários

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Adicionar usuário ao banco de dados
    adicionarUsuario($nome, $email, $senha);

    // Redirecionar para a página de login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>

<body>

    <h1>Cadastro de Usuário</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>

        <button type="submit">Cadastrar</button>
    </form>

    <p>Já possui uma conta? <a href="login.php">Faça login aqui</a>.</p>

</body>

</html>
