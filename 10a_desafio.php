<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
</head>
<body>


    <form method="post" action="">
        <label>Nome do Produto:</label><br>
        <input type="text" name="nome"><br><br>

        <label>Preço:</label><br>
        <input type="number" step="0.01" name="preco"><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <p><?php echo $mensagem; ?></p>
</body>

<?php
// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$pass = "Senai@118";
$dbname = "exercicio";

$conn = new mysqli($host, $user, $pass, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Mensagem de retorno
$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $preco = $_POST["preco"];

    // Validações
    if (empty($nome)) {
        $mensagem = " Erro: O nome do produto não pode estar vazio.";
    } elseif (!is_numeric($preco) || $preco <= 0) {
        $mensagem = " Erro: O preço deve ser um número positivo.";
    } else {
        // Prepara e executa a inserção
        $stmt = $conn->prepare("INSERT INTO produtos (nome, preco) VALUES (?, ?)");
        $stmt->bind_param("sd", $nome, $preco);

        if ($stmt->execute()) {
            $mensagem = " Produto cadastrado com sucesso!";
        } else {
            $mensagem = " Erro ao cadastrar o produto.";
        }

        $stmt->close();
    }
}

$conn->close();
?></html>