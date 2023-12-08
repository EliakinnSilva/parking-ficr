<?php
session_start();
require_once("conexao.php"); // Arquivo com a conexão ao banco de dados
?>
<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redireciona para a página de login se não estiver autenticado
    exit();
}

// Resto do código da página principal aqui
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <title>Sssoon Page </title>
    
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
	<link href="../assets/css/coming-sssoon.css" rel="stylesheet" />    
    
    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
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
            echo "<p>Bem-vindo, Usuário!</p>";
        }
        ?>

        <!-- Conteúdo da sua página aqui -->

    </div>

</body>

</html>
