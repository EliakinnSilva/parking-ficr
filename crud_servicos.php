<?php
// Adicionar serviço
function adicionarServico($nome, $descricao, $preco) {
    global $conn;

    $sql = "INSERT INTO servicos (nome, descricao, preco) VALUES ('$nome', '$descricao', $preco)";
    $conn->query($sql);
}

// Obter todos os serviços
function obterServicos() {
    global $conn;
    $sql = "SELECT * FROM servicos";
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
}

// Outras operações CRUD (editar, excluir) podem ser adicionadas conforme necessário.
?>
