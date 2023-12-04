<?php
session_start();
require_once("conexao.php"); // Arquivo com a conexão ao banco de dados
require_once("index.php.php"); 

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];

    // Adicionar serviço ao banco de dados
    adicionarServico($nome, $descricao, $preco);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Serviços</title>
</head>

<body>

    <h1>Cadastro de Serviços</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nome">Nome do Serviço:</label>
        <input type="text" name="nome" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" rows="4" required></textarea>

        <label for="preco">Preço:</label>
        <input type="text" name="preco" required>

        <button type="submit">Cadastrar</button>
    </form>

    <!-- Exemplo de listagem de serviços cadastrados (opcional) -->
    <h2>Serviços Cadastrados:</h2>
    <?php
    $servicos = obterServicos();
    if (!empty($servicos)) {
        echo "<ul>";
        foreach ($servicos as $servico) {
            echo "<li>{$servico['nome']} - {$servico['descricao']} - R$ {$servico['preco']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenhum serviço cadastrado ainda.</p>";
    }
    ?>

</body>

</html>
