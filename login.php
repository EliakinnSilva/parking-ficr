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
<h2>Login Form</h2>

<form action="/submit_login" method="post">
 <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
 </div>
</form>

