<?php
session_start(); // Inicia a sessão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta SQL para verificar o usuário e senha no banco de dados
    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Usuário válido, inicia a sessão e redireciona para a página principal
        $_SESSION["username"] = $username;
        header("Location: pagina_principal.php");
    } else {
        // Usuário inválido, exibe uma mensagem de erro
        echo "Nome de usuário ou senha incorretos";
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
