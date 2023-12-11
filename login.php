<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/coming-sssoon.css" rel="stylesheet" />

    <!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
</head>

<body>

<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="index.html">
                        HOME
                    </a>
                </li>
                <li>
                    <a href="login.php">
                        LOGIN
                    </a>
                </li>
                <li>
                    <a href="cadastro_usuario.php">
                        CADASTRO
                    </a>
                </li>
            </ul>
        </div>
    </div>
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

<!-- Formulário de login no HTML
<form action="/submit_login" method="post" class="form-horizontal">
    <div class="container">
        <div class="form-group">
            <label for="email" class="control-label col-sm-2"><b>Email</b></label>
            <div class="col-sm-10">
                <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
            </div>
        </div>

        <div class="form-group">
            <label for="senha" class="control-label col-sm-2"><b>Password</b></label>
            <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Enter Password" name="senha" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </div>
</form> -->

<!-- Inclua os scripts do Bootstrap no final do corpo do documento para melhor desempenho -->
<script src="assets/js/jquery-3.6.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
