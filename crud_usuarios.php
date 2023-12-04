<?php
// Adicionar usuário
function adicionarUsuario($nome, $email, $senha) {
    global $conn;
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha_hash')";
    $conn->query($sql);
}

// Obter todos os usuários
function obterUsuarios() {
    global $conn;
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
}

// Outras operações CRUD (editar, excluir) podem ser adicionadas conforme necessário.
?>
