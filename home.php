<?php
session_start();
require_once("conexao.php"); // Arquivo com a conexão ao banco de dados
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <nav>
        <a href="index.php">Home</a>
        <?php
        if (isset($_SESSION["usuario_id"])) {
            echo "<a href='logout.php'>Logout</a>";
        } else {
            echo "<a href='login.php'>Login</a>";
            echo "<a href='cadastro_usuario.php'>Cadastro de Usuário</a>";
        }
        ?>
        <?php
        // Links para as páginas de CRUD
        if (isset($_SESSION["usuario_id"])) {
            echo "<a href='usuarios.php'>CRUD de Usuários</a>";
            echo "<a href='servicos.php'>CRUD de Serviços</a>";
        }
        ?>
    </nav>

    <div class="container">
        <h1>Parking Ficr</h1>

        <?php
        if (isset($_SESSION["usuario_id"])) {
            echo "<p>Bem-vindo, {$_SESSION['nome_usuario']}!</p>";
            // Aqui você pode adicionar o conteúdo específico para usuários autenticados
            echo "<p>Conteúdo exclusivo para usuários autenticados...</p>";
        } else {
            // Conteúdo para visitantes não autenticados
            echo "<p>Esta é a página principal. Faça login para acessar recursos adicionais.</p>";
        }
        ?>

        <!-- Conteúdo adicional da sua página principal aqui -->

    </div>

</body>

</html>
