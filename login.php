<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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



<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar o formulário de login
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row["senha"])) {
            $_SESSION["usuario_id"] = $row["id"];
            header("Location: index.php");
            exit();
        } else {
            $erro = "Senha incorreta";
        }
    } else {
        $erro = "Usuário não encontrado";
    }
}
?>
<!-- Formulário de login no HTML -->


<form action="/submit_login" method="post">
 <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
 </div>
</form>

</body>
</html>